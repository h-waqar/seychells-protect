<section id="four_summary" class="hidden">
  <div class="cs-container">
    <!-- Summary Card -->
    <div class="cs-summary-card">
      <!-- Total Header -->
      <div class="cs-summary-header">
        <h2>Total</h2>
        <h2 id="summaryTotal">€477.05</h2>
      </div>

      <!-- Medical Protection Details -->
      <div class="cs-summary-body">
        <h4 class="cs-summary-title">Medical Protection</h4>

        <div class="cs-summary-row">
          <span class="cs-summary-label">Per Day Fee</span>
          <span class="cs-summary-value" id="protectionPerDayPrice">€6.95</span>
        </div>

        <div class="cs-summary-row">
          <span class="cs-summary-label">Total Days</span>
          <span class="cs-summary-value" id="summaryTotalDays">1</span>
        </div>

        <div class="cs-summary-row" id="divTotalPassports" style="display: none;">
          <span class="cs-summary-label">Total Passports</span>
          <span class="cs-summary-value" id="summaryTotalPassports">0</span>
        </div>

        <div class="cs-summary-row">
          <span class="cs-summary-label">Bank Fee</span>
          <span class="cs-summary-value" id="bankFee">€18.35</span>
        </div>

        <div class="cs-summary-row">
          <span class="cs-summary-label">Number of Persons</span>
          <span class="cs-summary-value" id="totalNumberOfPersons">66</span>
        </div>

        <div class="cs-summary-row">
          <span class="cs-summary-label">Medical Protection Fee</span>
          <span class="cs-summary-value" id="MedicalProtectionFee">€458.70</span>
        </div>

        <!-- Dynamic Persons Summary (if needed) -->
        <div class="cs_summary_persons" id="csSummaryPersons" style="display: none;">
        </div>
      </div>

      <!-- Coupon Code -->
      <div class="cs-summary-row">
        <div class="cs-coupon-wrapper">
          <input type="text" id="coupon-code" placeholder="Coupon Code">
          <button type="button" id="apply-coupon">Apply</button>
        </div>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="cs-button-wrapper">
      <button type="button" class="prev pr-3" id="btn_SummaryPrev">
        Previous
      </button>
      <button type="button" class="btn btn-info" id="btn_SummaryContinue">
        Continue
      </button>
    </div>



  </div>
</section>
