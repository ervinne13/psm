
/* global SGFormatter */

var InitializationUtility = {};

InitializationUtility.initializeDatePickers = function () {
    $('.datepicker').each(function () {

        var date = $(this).val() ? moment($(this).val(), SGFormatter.SERVER_DATE_FORMAT) : new Date();

        $(this).daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate: date,
            locale: {
                format: SGFormatter.DISPLAY_DATE_FORMAT
            }
        });
    });
};