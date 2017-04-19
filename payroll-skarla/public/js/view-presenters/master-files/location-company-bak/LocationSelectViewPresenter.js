
/* global baseURL */

class LocationSelectViewPresenter extends PaginatedSelectViewPresenter {

    constructor() {
        super(baseURL + "json/master-files/locations");
        this.dependsOnCompany = null;
    }

    dependOnCompanyField($field) {
        var self = this;
        $($field).change(() => {
            self.ajaxParams.company_code = $(this).val();
        });
    }

    dependentCompanyField($field) {
        
    }

}
