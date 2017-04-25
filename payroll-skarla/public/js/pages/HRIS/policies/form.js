
/* global form_utilities, baseUrl, mode, policy, SGFormatter, InitializationUtility, queryStringParams, baseURL, selectablePayrollItems */

(function () {

    "use strict";

    var policyPayrollItemRowTemplate;

    $(document).ready(function () {

        if (mode !== "view") {
            form_utilities.setFieldsRequiredDisplay();
        } else {
            form_utilities.disableFieldsOnViewMode(mode);
        }

        policyPayrollItemRowTemplate = _.template($('#policy-payroll-item-row-form-template').html());

        initializeUI();
        initializeForm();
        initializePolicyPayrollItemTable();
        initializePolicyPayrollItemTableEvents();

        initializeEvents();

    });

    function initializeUI() {
        InitializationUtility.initializeDatePickers();
    }

    function initializeForm() {
        form_utilities.moduleUrl = baseUrl + "/HRIS/policies";
        form_utilities.updateObjectId = policy.code;
        form_utilities.validate = true;
        form_utilities.appendDataOnSave = appendDataOnSave;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

    function initializePolicyPayrollItemTable() {
        $('#policy-payroll-item-table tbody').html('');
        policy.payroll_items.forEach(pi => {
            addPayrollItem(pi);
        });
    }

    function initializeEvents() {
        $('#action-add-payroll-items').click(function () {
            $('#add-payroll-item-modal').modal('show');
        });

        $('#action-add-payroll-item').click(function () {

            let selectedPayrollItemCode = $('#new-payroll-item-code-select').val();

            if (!validateNewPayrollItem(selectedPayrollItemCode)) {
                swal("Error", $('#new-payroll-item-code-select option:selected').text().trim() + " is already selected.", "error");
                return;
            }

            $('#add-payroll-item-modal').modal('hide');
            var selectedPayrollItem;
            selectablePayrollItems.forEach(spi => {
                if (selectedPayrollItemCode == spi.code) {
                    selectedPayrollItem = spi;
                    return;
                }
            });

            if (selectedPayrollItem) {
                console.log(selectedPayrollItem);
                addPayrollItem(selectedPayrollItem);
            }

        });
    }

    function initializePolicyPayrollItemTableEvents() {
        $('#policy-payroll-item-table tbody').on('click', '.action-delete-payroll-item', function () {
            var payrollItemCode = $(this).data('payroll-item-code');
            swal({
                title: "Are you sure?",
                text: "This payroll item won't be included in the next payroll of users with this policy",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function () {
                $('.policy-payroll-item-row[data-payroll-item-code=' + payrollItemCode + ']').remove();
            });
        });
    }

    function validateNewPayrollItem(payrollItemCode) {
        let selectedPayrollItemCodes = getSelectedPayrollItems();

        var itemExisting = false;

        selectedPayrollItemCodes.forEach(spic => {            
            if (spic == payrollItemCode) {
                itemExisting = true;
                return;
            }
        });

        return !itemExisting;
    }

    function addPayrollItem(payrollItem) {
        $('#policy-payroll-item-table tbody').append(policyPayrollItemRowTemplate(payrollItem));
    }

    function appendDataOnSave(data) {
        data.payroll_items = getSelectedPayrollItems();
        return data;
    }

    function getSelectedPayrollItems() {

        var selectedPayrollItems = [];

        $('.policy-payroll-item-row').each(function () {
            let payrollItemCode = $(this).data('payroll-item-code');
            selectedPayrollItems.push(payrollItemCode);
        });

        return selectedPayrollItems;

    }

})();
