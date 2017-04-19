
/* global SGFormatter, moment, baseURL */

/**
 * Requires:
 *  Template(s): #work-schedule-row-template
 *  Module(s)/Plugin(s): SGFormatter, moment, swal
 * @type type
 */
class EmployeeWorkScheduleViewPresenter {

    constructor(employeeCode) {

        this.employeeCode = employeeCode;
        this.$table = $('#employee-work-schedule-table');

        if ($('#work-schedule-row-template').html()) {
            this.ewsRowTemplate = _.template($('#work-schedule-row-template').html());
        } else {
            throw new Error("Missing #work-schedule-row-template");
        }

        this._addedWorkScheduleList = [];
        this.initializeEvents();
    }

    initializeEvents() {
        var self = this;
        this.$table.on('click', '.action-delete-work-schedule', function () {
            let effectiveDateString = $(this).data('effective-date');

            self.onDeleteScheduleClicked(effectiveDateString, this);
        });
    }

    getEmployeeWorkScheduleFromUI() {
        return {
            effective_date: moment($('[name=effective_date]').val(), SGFormatter.DISPLAY_DATE_FORMAT),
            work_schedule: {
                code: $('[name=work_schedule_code]').val(),
                display_name: ("" + $('[name=work_schedule_code] option:selected').text()).trim(),
            }
        };
    }

    /**
     * Requires: work_schedule_code, effective_date
     * @returns {undefined}
     */
    addEmployeeWorkScheduleFromUI() {
        let ews = this.getEmployeeWorkScheduleFromUI();
        ews.row_state = "created";
        ews.employee_code = this.employeeCode;

        this.validateNewEmployeeWorkSchedule(ews);
        let ewsView = this.ewsRowTemplate(ews);

        this.$table.find('tbody').append(ewsView);

        this._addedWorkScheduleList.push(ews);

    }

    validateNewEmployeeWorkSchedule(ews) {
        let $existingEWS = $('[data-effective-date=' + moment(ews.effective_date).format(SGFormatter.SERVER_DATE_FORMAT) + ']');
        if ($existingEWS.length) {
            throw new Error("A work schedule for " + moment(ews.effective_date).format(SGFormatter.DISPLAY_DATE_FORMAT) + " is already set");
        }
    }

    displayEmployeeWorkScheduleList(ewsList) {
        var self = this;

        ewsList.forEach(ews => {
            ews.row_state = "unmodified";
            ews.effective_date = moment(ews.effective_date);

            let ewsView = this.ewsRowTemplate(ews);
            self.$table.find('tbody').append(ewsView);
        });
    }

    /** ********************************************************** */
    //<editor-fold defaultstate="collapsed" desc="Encapsulators">    

    get addedWorkScheduleList() {
        return this._addedWorkScheduleList;
    }

    //</editor-fold>

    /** ********************************************************** */
    //<editor-fold defaultstate="collapsed" desc="Events">

    /**
     * 
     * @param {string} effectiveDateString     
     * @param {jquery element} context
     * @returns {undefined}
     */
    onDeleteScheduleClicked(effectiveDateString, context) {

        var self = this;

        let $row = $(context).parents('tr');
        let rowState = $row.data('row-state');

        if (rowState != 'created') {
            swal({
                title: "Are you sure?",
                text: "This record will be permanently deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                self.deleteExistingWorkSchedule(effectiveDateString);
            });
        } else {
            $row.remove();
        }

    }
    //</editor-fold>

    /** ********************************************************** */
    //<editor-fold defaultstate="collapsed" desc="API Functions">

    /**
     * 
     * @param {String} effectiveDateString
     * @returns {undefined}
     */
    deleteExistingWorkSchedule(effectiveDateString) {
        let url = baseURL + "/HRIS/employees/" + this.employeeCode + "/effective-date/" + effectiveDateString;

        $.ajax({
            url: url,
            type: "DELETE",
            success: function (response) {
                console.log(response);
                swal("Success", "Record deleted", "success");

                setTimeout(function () {
                    location.reload();
                    window.location = window.location + "?openTab=#tab-work-schedule";
                }, 1500);

            },
            error: function (response) {
                console.error(response);
                swal("Error", response.responseText, "error");
            }
        });
    }

    //</editor-fold>


}
