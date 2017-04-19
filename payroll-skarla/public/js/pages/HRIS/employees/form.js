
/* global form_utilities, baseUrl, mode, employee, SGFormatter, InitializationUtility, queryStringParams */

(function () {

    "use strict";

    var employeeWorkScheduleViewPresenter,
            employeePolicyTableViewPresenter,
            locationSelectViewPresenter;

    $(document).ready(function () {

        initializeViewPresenters();

        if (mode !== "view") {
            form_utilities.setFieldsRequiredDisplay();
        } else {
            form_utilities.disableFieldsOnViewMode(mode);
        }

        initializeUI();
        initializeForm();
        initializeEvents();

        initializeViewData();

    });

    function initializeViewPresenters() {
        employeeWorkScheduleViewPresenter = new EmployeeWorkScheduleViewPresenter(employee.code);

        employeePolicyTableViewPresenter = new EmployeePolicyTableViewPresenter();
        employeePolicyTableViewPresenter.setOnTableInitialized(onPolicyTableInitialized);

        locationSelectViewPresenter = new LocationSelectViewPresenter();
        locationSelectViewPresenter.initializeEvents();
    }

    function initializeUI() {
        InitializationUtility.initializeDatePickers();

        $('.auto-numeric').autoNumeric();

        if (queryStringParams["openTab"]) {
            $('a[href=#' + queryStringParams["openTab"] + ']').click();
        }

    }

    function initializeForm() {
        form_utilities.moduleUrl = baseUrl + "/HRIS/employees";
        form_utilities.updateObjectId = employee.code;
        form_utilities.validate = true;
        form_utilities.appendDataOnSave = appendDataOnSave;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

    function initializeEvents() {
        $(document).on('click', '#action-assign-work-schedule', function () {
            try {
                employeeWorkScheduleViewPresenter.addEmployeeWorkScheduleFromUI();
                $('#work-schedule-modal').modal('hide');
                console.log(employeeWorkScheduleViewPresenter.addedWorkScheduleList);
            } catch (e) {
                swal("Error", e.message, "error");
            }
        });
    }

    function initializeViewData() {
        console.log(employee);
        employeeWorkScheduleViewPresenter.displayEmployeeWorkScheduleList(employee.employee_work_schedules);
    }

    function appendDataOnSave(data) {
        data.employeeWorkSchedules = []; //employeeWorkScheduleViewPresenter.addedWorkScheduleList;

        employeeWorkScheduleViewPresenter.addedWorkScheduleList.forEach(ews => {
            ews.effective_date = ews.effective_date.format(SGFormatter.SERVER_DATETIME_FORMAT);
            ews.work_schedule_code = ews.work_schedule.code;
            data.employeeWorkSchedules.push(ews);
        });

        data.employeePayrollItemAmounts = employeePolicyTableViewPresenter.employeePayrollItemAmounts;

        return data;
    }

    function onPolicyTableInitialized() {
        employeePolicyTableViewPresenter.employeePayrollItemAmounts = employee.payroll_items_amount;
    }

})();
