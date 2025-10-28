/**
 * CyberSourceHandler
 *
 * - Debounced tokenization wired to CyberSource Microform fields.
 * - Avoids re-tokenizing on every keystroke; respects simple rate limits.
 * - Keeps token in-memory + hidden input (#cybs_token).
 * - On submit: allows native submit when token is fresh; otherwise generates token and auto-resubmits.
 *
 * Constructor options:
 *  - restUrl (string)             : server endpoint to fetch captureContext
 *  - cardContainer (string)       : selector for card number container
 *  - cvvContainer (string)        : selector for CVV container
 *  - errorContainer (string)      : selector for showing errors
 *  - tokenTTL (ms)                : token lifetime (default 10 minutes)
 *  - tokenDebounceMs (ms)         : debounce delay for token creation (default 700ms)
 *  - minTokenInterval (ms)        : minimum ms between token requests (default 6000ms)
 */
class CyberSourceHandler {
  constructor(options = {}) {
    this.flex = null;
    this.microform = null;

    // config
    this.restUrl = options.restUrl;
    this.ajaxUrl = options.ajaxUrl; // Add ajaxUrl to options
    this.cardContainer = options.cardContainer || "#cybs-card-number-container";
    this.cvvContainer = options.cvvContainer || "#cybs-security-code-container";

    // token management
    this.token = null; // current transient token (string)
    this.tokenExpiresAt = 0; // timestamp
    this.tokenExpiryTimeoutId = null;
    this.tokenRequestInFlight = false; // boolean lock
    this.tokenPromise = null; // promise for the in-flight request
    this.tokenDebounceTimer = null;
    this.lastTokenRequestAt = 0;

    // timings (adjustable)
    this.tokenTTL = options.tokenTTL || 10 * 60 * 1000; // 10 minutes
    this.tokenDebounceMs = options.tokenDebounceMs || 700; // 700 ms
    this.minTokenInterval = options.minTokenInterval || 6000; // 6 seconds

    jQuery(this.cardContainer, this.cvvContainer).on("change", () => {
      alert("custom on change called");
      this.generateToken();
    });
  }

  async initCyberSource() {
    // alert("CSH: initCyberSource called.");
    try {
      console.log("Initializing CyberSource Microform...");
      const captureContext = await this.fetchCaptureContext();
      // alert("CSH: Capture Context fetched.");
      await this.loadMicroformScript(captureContext);
      // alert("CSH: Microform script loaded.");
      if (typeof window.Flex === "undefined") {
        throw new Error("Flex library did not load.");
      }
      this.setupMicroform(captureContext);
      console.log("CyberSource Microform initialized successfully.");
      // alert("CSH: Microform setup complete.");
    } catch (e) {
      console.error("CyberSource Initialization Failed:", e);
      // this.showError(e.message || e);
      // alert("CSH: initCyberSource failed: " + (e.message || e));
    }
  }

  async fetchCaptureContext() {
    const res = await fetch(this.restUrl, { method: "POST" });
    if (!res.ok) {
      const errorData = await res.text();
      throw new Error("Could not create secure payment session: " + errorData);
    }
    const json = await res.json();
    if (!json.captureContext)
      throw new Error("Capture context not found in server response.");
    console.log("Capture Context successfully fetched.");
    return json.captureContext;
  }

  loadMicroformScript(captureContext) {
    const payload = this.parseJwtPayload(captureContext);
    const clientLibrary = payload?.ctx?.[0]?.data?.clientLibrary;
    if (!clientLibrary)
      throw new Error(
        "Could not find Microform library URL in capture context."
      );

    return new Promise((resolve, reject) => {
      const script = document.createElement("script");
      script.src = clientLibrary;
      script.onload = () => resolve();
      script.onerror = () =>
        reject(new Error("Failed to load the CyberSource Microform library."));
      document.head.appendChild(script);
    });
  }

  setupMicroform(captureContext) {
    // const styles = {
    //   input: {
    //     "font-size": "16px",
    //     "line-height": "1.5",
    //   },
    //   "::-webkit-input-placeholder": { color: "#888" },
    //   "::placeholder": { color: "#888" },
    // };

    this.flex = new window.Flex(captureContext);
    this.microform = this.flex.microform({
      placeholder: { number: "•••• •••• •••• ••••", securityCode: "CVV" },
      showErrorMessages: false,
    });

    // create fields
    const number = this.microform.createField("number", {
      placeholder: "•••• •••• •••• ••••",
    });
    const securityCode = this.microform.createField("securityCode", {
      placeholder: "CVV",
    });

    // mount
    number.load(this.cardContainer);
    securityCode.load(this.cvvContainer);

    // number.mount(this.cardContainer);
    // securityCode.mount(this.cvvContainer);

    // wire events:
    // - hide errors when fields change
    // - invalidate token and schedule debounced tokenization
    number.on("change", () => {
      this.hideError();
      this.invalidateToken();
      this.scheduleTokenization();
    });
    securityCode.on("change", () => {
      this.hideError();
      this.invalidateToken();
      this.scheduleTokenization();
    });

    // on blur, schedule a quicker tokenization (improves UX when typing finished)
    number.on("blur", () => this.scheduleTokenization(300));
    securityCode.on("blur", () => this.scheduleTokenization(300));
  }

  async getToken() {
    return new Promise((resolve, reject) => {
      if (!this.microform) {
        reject("CyberSource Microform is not initialized. Please try again.");
        return;
      }

      const expirationMonth =
        document.querySelector("#cybs-expiration-month")?.value || "12";
      const expirationYear =
        document.querySelector("#cybs-expiration-year")?.value || "2034";

      console.log("Expiration Month (from DOM):", expirationMonth);
      console.log("Expiration Year (from DOM):", expirationYear);

      const options = {
        expirationMonth: expirationMonth,
        expirationYear: expirationYear,
      };
      console.log("options12", options);

      this.microform.createToken(options, (err, token) => {
        if (err) {
          const errorMessage =
            err.details?.map((d) => d.message).join(" ") ||
            err.message ||
            "Please check your card details and try again.";
          // this.showError(errorMessage);
          reject(err);
        } else {
          const transientToken =
            token?.transientToken ||
            token?.flexToken ||
            token?.token ||
            token?.flexResponse?.transientToken ||
            token;

          resolve(transientToken);
        }
      });
    });
  }

  /* ---------------- token helpers ---------------- */

  isTokenFresh() {
    return !!this.token && Date.now() < this.tokenExpiresAt;
  }

  invalidateToken() {
    this.token = null;
    this.tokenExpiresAt = 0;
    if (this.tokenExpiryTimeoutId) {
      clearTimeout(this.tokenExpiryTimeoutId);
      this.tokenExpiryTimeoutId = null;
    }
    // clear hidden input if present
    const hiddenInput = document.getElementById("cybs_token");
    if (hiddenInput) hiddenInput.value = "";
  }

  scheduleTokenization(debounceMs = 4) {
    console.log("schedule debounce called");

    clearTimeout(this.tokenDebounceTimer);
    const ms = debounceMs ?? this.tokenDebounceMs;
    this.tokenDebounceTimer = setTimeout(() => {
      const cardNumberField = document.querySelector(this.cardContainer);
      const cvvField = document.querySelector(this.cvvContainer);

      this.generateToken().catch(() => {});
      // Only attempt tokenization if both fields have some input
      // if (
      //   cardNumberField &&
      //   cardNumberField.value &&
      //   cvvField &&
      //   cvvField.value
      // ) {
      //   // generate token in background (no immediate form resubmit)
      //   // swallow errors (getToken already shows them)
      // } else {
      //   // If fields are empty, just invalidate token without showing error
      //   this.invalidateToken();
      // }
    }, ms);
  }

  /**
   * generateToken(formElementToResubmit = null, immediate = false)
   *
   * - If a token is in-flight, returns the existing in-flight promise.
   * - If token is fresh, returns it immediately.
   * - If minTokenInterval has not elapsed and immediate is false, waits the required time then retries.
   * - If formElementToResubmit is provided, calls formElementToResubmit.submit() once token is ready.
   */
  async generateToken(formElementToResubmit = null, immediate = false) {
    console.log("Generate Token Called");
    // alert("CSH: generateToken called. immediate: " + immediate);
    // Return existing in-flight promise if present
    if (this.tokenPromise) {
      // alert("CSH: Token promise already exists.");
      // if caller wants resubmit after this token finishes, chain it
      if (formElementToResubmit) {
        return this.tokenPromise.then((tok) => {
          try {
            formElementToResubmit.submit();
          } catch (e) {}
          return tok;
        });
      }
      return this.tokenPromise;
    }

    // If we already have a fresh token
    if (this.isTokenFresh()) {
      // alert("CSH: Token is fresh, returning existing token.");
      if (formElementToResubmit) {
        try {
          formElementToResubmit.submit();
        } catch (e) {}
      }
      return this.token;
    }

    // rate limiting: enforce minTokenInterval unless immediate
    const sinceLast = Date.now() - (this.lastTokenRequestAt || 0);
    if (!immediate && sinceLast < this.minTokenInterval) {
      // alert("CSH: Rate limiting active, waiting to generate token.");
      const wait = this.minTokenInterval - sinceLast;
      // create a short-lived promise to wait then retry
      this.tokenPromise = new Promise((resolve, reject) => {
        setTimeout(() => {
          // clear tokenPromise placeholder before recursive call to avoid immediate return
          this.tokenPromise = null;
          this.generateToken(formElementToResubmit, false)
            .then(resolve)
            .catch(reject);
        }, wait);
      });
      return this.tokenPromise;
    }

    // Start token request
    this.tokenRequestInFlight = true;
    this.lastTokenRequestAt = Date.now();
    // alert("CSH: Starting new token request.");

    this.tokenPromise = (async () => {
      try {
        // alert("CSH: Calling getToken().");
        const transient = await this.getToken({});
        // alert("CSH: getToken() returned. Transient: " + transient);
        if (!transient) throw new Error("No token received from Microform.");

        // set token + hidden input
        this.token = transient;
        this.tokenExpiresAt = Date.now() + this.tokenTTL;
        const hiddenInput = document.getElementById("cybs_token");
        if (hiddenInput) {
          hiddenInput.value = this.token;
          // alert("CSH: cybs_token hidden input populated.");
        } else {
          // alert("CSH: cybs_token hidden input NOT found.");
        }

        // schedule expiry (clear only if token unchanged)
        if (this.tokenExpiryTimeoutId) {
          clearTimeout(this.tokenExpiryTimeoutId);
        }
        this.tokenExpiryTimeoutId = setTimeout(() => {
          if (Date.now() >= this.tokenExpiresAt) this.invalidateToken();
        }, this.tokenTTL + 100);

        // auto-resubmit if requested
        if (formElementToResubmit) {
          // alert("CSH: formElementToResubmit exists, performing AJAX submission.");
          try {
            const formData = new FormData(formElementToResubmit);
            formData.append("action", "cybersource_sy"); // Add the AJAX action

            const response = await fetch(this.ajaxUrl, {
              method: "POST",
              body: formData,
            });
            const result = await response.json();
            // alert("CSH: AJAX response received. Success: " + result.success + ", Message: " + result.message);

            if (result.success) {
              if (
                typeof _swiftUiManager !== "undefined" &&
                _swiftUiManager.handle_PaymentSuccessful
              ) {
                _swiftUiManager.handle_PaymentSuccessful();
              } else if (
                typeof _visaSwift !== "undefined" &&
                _visaUiManager.alertSuccess
              ) {
                _visaSwift.alertSuccess("Payment Successful", result.message);
              } else {
                // alert("Payment Successful: " + result.message);
              }
            } else {
              this.showError(result.message || "Payment failed.");
            }
          } catch (e) {
            console.error("Form submission after token generation failed:", e);
            this.showError("An error occurred after token generation.");
            // alert("CSH: AJAX submission failed: " + (e.message || e));
          }
        }

        return this.token;
      } finally {
        this.tokenRequestInFlight = false;
        // allow a small delay before clearing tokenPromise so chained callers see the result
        const held = this.tokenPromise;
        setTimeout(() => {
          if (this.tokenPromise === held) this.tokenPromise = null;
        }, 50);
      }
    })();

    return this.tokenPromise;
  }

  /* ---------------- form binding ---------------- */

  /**
   * bindFormSubmit(formSelector)
   * - Normal flow: if token is fresh => browser submits normally (no preventDefault).
   * - If token missing: prevents submit, generates token immediately (ignoring minTokenInterval),
   *   and auto-resubmits when token arrives.
   * - If token request already in-flight: prevents submit + shows message then retries resubmit shortly.
   */
  bindFormSubmit(formSelector) {
    // alert("CSH: bindFormSubmit called for " + formSelector);
    console.log("bindFormSubmit Called");

    document
      .querySelector(formSelector)
      .addEventListener("submit", async (e) => {
        // alert("CSH: Form submit event caught for " + formSelector);
        // happy path: we already have a fresh token — let native submit run
        if (this.isTokenFresh()) {
          // alert("CSH: Token is fresh, allowing native submit.");
          return;
        }

        // if a token request is already in-flight, block submit and retry shortly
        if (this.tokenRequestInFlight) {
          // alert("CSH: Token request in-flight, preventing default.");
          e.preventDefault();
          // this.showError("Processing payment — please wait a moment...");
          // try to resubmit after a short delay if token becomes ready
          setTimeout(() => {
            const formEl = document.querySelector(formSelector);
            if (this.isTokenFresh()) {
              // alert("CSH: Token now fresh, resubmitting form.");
              try {
                formEl.submit();
              } catch (err) {}
            } else {
              // alert("CSH: Token still not fresh after delay.");
              // if still no token, leave it — user can click again (or we could re-trigger)
              this.hideError();
            }
          }, 700);
          return;
        }

        // fallback: no token and no in-flight request => generate immediately and resubmit
        // alert("CSH: No fresh token, generating immediately and preventing default.");
        e.preventDefault();
        try {
          const formEl = e.currentTarget;
          await this.generateToken(formEl, true); // immediate = true bypasses minTokenInterval
          // alert("CSH: Token generation initiated on submit.");
        } catch (err) {
          console.error("Token generation on-submit failed:", err);
          // this.showError(err.message || "Token generation on-submit failed.");
          // alert("CSH: Token generation on-submit failed: " + (err.message || err));
        }
      });
  }

  /* ---------------- UI helpers ---------------- */

  showError(message) {
    console.error("Displaying error: ", message);
    if (typeof _visaSwift !== "undefined" && _visaSwift.alertDanger) {
      _visaSwift.alertDanger("Payment Error", message);
    } else {
      console.warn("CSH error: ", message);
      // alert("Payment Error: " + message); // Fallback alert
    }
  }

  hideError() {
    // No direct hide equivalent for _visaSwift.alertDanger modal
  }

  parseJwtPayload(jwt) {
    try {
      return JSON.parse(
        atob(jwt.split(".")[1].replace(/-/g, "+").replace(/_/g, "/"))
      );
    } catch {
      return null;
    }
  }

  async generateTokenManual() {
    if (!this.microform) {
      throw new Error("CyberSource Microform is not initialized.");
    }

    // If token is fresh, return it
    if (this.isTokenFresh()) {
      return this.token;
    }

    const token = await this.getToken();
    this.token = token;
    this.tokenExpiresAt = Date.now() + this.tokenTTL;

    // set hidden input
    const hiddenInput = document.getElementById("cybs_token");
    if (hiddenInput) hiddenInput.value = this.token;

    return token;
  }
}
