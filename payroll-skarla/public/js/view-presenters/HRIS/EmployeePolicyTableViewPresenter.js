
/* global baseURL */

class EmployeePolicyTableViewPresenter {
    constructor() {
        this.$policyCodeField = $('[name=policy_code]');
        this.$table = $('#policy-payroll-item-table');

        this.policyPayrollItemRowTemplate = _.template($('#policy-payroll-item-row-template').html());

        this.onTableInitialized;

        this.initializeTable();
        this.initializeEvents();
    }

    initializeTable() {
        let policyCode = $(this.$policyCodeField).val();
        let url = baseURL + "/payroll/payroll-items/" + policyCode + "/requires-employee-amount";

        var self = this;

        $.get(url, function (payrollItems) {
            console.log(payrollItems);

            $(self.$table).find('tbody').html('');

            payrollItems.forEach(pi => {

                //  tax withheld is always automatically computed
                if (pi.code === "SYS_D_WHT") {
                    return;
                }

                let payrollItemRowView = self.policyPayrollItemRowTemplate(pi);
                $(self.$table).find('tbody').append(payrollItemRowView);
            });

            $('.policy-payroll-item-amount').autoNumeric();

            if (self.onTableInitialized) {
                self.onTableInitialized();
            }

        });
    }

    initializeEvents() {
        var self = this;
        $(this.$policyCodeField).change(function () {
            self.initializeTable();
        });
    }

    set employeePayrollItemAmounts(payrollItemAmounts) {
        if (payrollItemAmounts) {
            payrollItemAmounts.forEach(pia => {
                $('.policy-payroll-item-amount[data-payroll-item-code=' + pia.payroll_item_code + ']').autoNumeric('set', pia.amount);
            });
        }
    }

    get employeePayrollItemAmounts() {
        var epia = [];
        $('.policy-payroll-item-amount').each(function () {
            epia.push({
                payroll_item_code: $(this).data('payroll-item-code'),
                amount: $(this).autoNumeric('get')
            });
        });

        return epia;
    }

    setOnTableInitialized(callback) {
        this.onTableInitialized = callback;
    }

}
