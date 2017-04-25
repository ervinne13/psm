
/* global SGFormatter, baseUrl, baseURL */

/**
 * Stateful on: pageState
 * @returns {undefined}
 */
(function () {

    "use strict";

    var employeeSelectionViewPresenter;
    var employeeTimeEntryRowTemplate;

    var pageState = {
        dateFilterFrom: new Date(),
        dateFilterTo: new Date()
    };

    $(document).ready(function () {

        employeeTimeEntryRowTemplate = _.template($('#employee-time-entry-row-template').html());

        initializeUI();
        initializeEvents();

        initializeEmployeeTimeEntriesImport();

    });

    function initializeUI() {

        employeeSelectionViewPresenter = new EmployeeSelectionViewPresenter($('#input-employee-code'));

        $('#input-date-filter').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

    }

    function initializeEvents() {

        $('#input-employee-code').change(function () {
            reloadTimeEntries();
        });

        //  date filter
        $('#input-date-filter').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format(SGFormatter.DISPLAY_DATE_FORMAT) + ' - ' + picker.endDate.format(SGFormatter.DISPLAY_DATE_FORMAT));

            pageState.dateFilterFrom = picker.startDate;
            pageState.dateFilterTo = picker.endDate;

            console.log(pageState);

            onPageStateUpdated("date-filter");

        });

        $('#input-date-filter').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    }

    function onPageStateUpdated(stateName) {

        if (stateName === "date-filter") {
            reloadTimeEntries();
        }

    }

    function reloadTimeEntries() {

        //  collect and validate required parameters first
        let employeeCode = $('#input-employee-code').val();
        let dateFrom = SGFormatter.convertToServerDate(pageState.dateFilterFrom);
        let dateTo = SGFormatter.convertToServerDate(pageState.dateFilterTo);

        if (employeeCode && dateFrom && dateTo) {
            let url = baseUrl + "/timekeeping/employee-time-entries/json";
            let params = {
                employeeCode: employeeCode,
                dateFrom: dateFrom,
                dateTo: dateTo
            };

            $.get(url, params, function (chronoLog) {
                $('#employee-time-entries-table tbody').html('');
                chronoLog.forEach(cl => {
                    $('#employee-time-entries-table tbody').append(employeeTimeEntryRowTemplate(cl));
                });
            });

        }

    }

    function initializeEmployeeTimeEntriesImport() {

        $('#action-employee-time-entries-import').click(function () {

            let formData = new FormData($("#employee-time-entries-upload-form")[0]);
            let url = baseURL + "/timekeeping/employee-time-entries/import-excel";

            $.ajax({
                url: url,
                data: formData,
                type: 'post',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    swal("Success", "Time entries uploaded successfully", "success");
                },
                error: function (xhr) {
                    swal("Error", "Failed to upload, please make sure you are uploading a valid upload template.\n\nDetails: " + xhr.responseText, "error");
                }
            });
        });

    }

})();
