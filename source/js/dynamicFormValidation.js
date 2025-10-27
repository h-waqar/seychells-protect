class DynamicFormValidation {
  constructor($) {
    this.$ = $;
  }

  // ✅ Core method for validating a form section
  validateSection({ selector, fields = [] }) {
    const $section = this.$(selector);
    let allValid = true;

    // Clear previous errors
    $section.find(".cs-error").removeClass("cs-error");
    $section.find(".cs-error-text").remove();

    fields.forEach((field) => {
      const $input = $section.find(`[name='${field.name}']`);
      const value = $input.val() ? $input.val().trim() : "";
      let valid = true;

      switch (field.type) {
        case "radio":
          if ($section.find(`input[name='${field.name}']:checked`).length === 0)
            valid = false;
          break;

        case "date":
          if (!this.isValidDate(value)) valid = false;
          break;

        case "text":
        case "email":
        case "number":
        case "textarea":
        case "select":
          valid = this.applyRules(value, field.rules);
          break;

        default:
          valid = true;
      }

      if (!valid) {
        allValid = false;
        this.showError($input, field.message, field.type, $section);
      }
    });

    // Remove error styling when user types/selects again
    $section.on("input change", "input, select, textarea", function () {
      $(this).removeClass("cs-error");
      $(this).next(".cs-error-text").remove();
    });

    return { status: allValid };
  }

  // ✅ Helper: validate according to rule set
  applyRules(value, rules = {}) {
    if (rules.required && !value) return false;
    if (rules.minLength && value.length < rules.minLength) return false;
    if (rules.maxLength && value.length > rules.maxLength) return false;
    if (rules.onlyText && !/^[A-Za-z\s]+$/.test(value)) return false;
    if (rules.onlyNumbers && !/^\d+$/.test(value)) return false;
    if (rules.regex && !rules.regex.test(value)) return false;
    return true;
  }

  // ✅ Helper: check if date is valid
  isValidDate(dateStr) {
    if (!dateStr) return false;
    const d = new Date(dateStr);
    return !isNaN(d.getTime());
  }

  // ✅ Helper: show inline error
  showError($input, message, type, $section) {
    if (type === "radio") {
      $section.find("label").addClass("cs-error");
      if ($section.find(".cs-error-text").length === 0) {
        $section.append(`<p class="cs-error-text">${message}</p>`);
      }
    } else {
      $input.addClass("cs-error");
      if ($input.next(".cs-error-text").length === 0) {
        $input.after(`<p class="cs-error-text">${message}</p>`);
      }
    }
  }
}

jQuery(document).ready(() => {
  window._dFV = new DynamicFormValidation(jQuery);
});
