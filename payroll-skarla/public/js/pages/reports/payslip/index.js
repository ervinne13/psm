
(function () {

    var companySelectVP, locationSelectVP;

    $(document).ready(function () {
        initUI();
    });

    function initUI() {
        companySelectVP = new CompanySelectViewPresenter();
        locationSelectVP = new LocationSelectViewPresenter();

        companySelectVP.applyTo($('[name=company_code]'));

        locationSelectVP.dependOnCompany($('[name=company_code]'));
        locationSelectVP.applyTo($('[name=location_code]'));

    }

})();
