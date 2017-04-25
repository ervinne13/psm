
/* global baseUrl */

class EmployeeSelectionViewPresenter extends PaginatedSelectViewPresenter {

    constructor($field) {
        super();
        this.url = baseUrl + "/HRIS/employees/paginated-json";
        
        this.idField = "code";
        this.textField = "code";
        this.renderText = this.textRenderer;

        this.ajaxParams = {};

        this.applyTo($field);
    }

    textRenderer(employee) {
        return "(" + employee.code + ") " + employee.first_name + " " + employee.last_name;
    }

}
