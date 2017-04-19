
/* global baseURL */

class CompanySelectViewPresenter extends PaginatedSelectViewPresenter {

    constructor() {
        super(baseURL + "/json/master-files/companies");
        this.idField = "code";
        this.textField = "display_name";
    }

}
