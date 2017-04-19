
class LocationSelectViewPresenter {

    constructor($field) {
        this.$field = $field ? $field : $('[name=location_code]');
    }

    initializeEvents() {
        $(this.$field).change(function () {
            let $selectedOption = $(this).find(':selected');
            let selectedCompanyCode = $selectedOption.data('company-code');
            let selectedCompanyName = $selectedOption.data('company-display-name');

            $('[data-source=company_code]').val(selectedCompanyCode);
            $('[data-source=company_display_name]').val(selectedCompanyName);
        });
    }

}
