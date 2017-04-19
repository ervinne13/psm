
/* global form_utilities, baseUrl, mode, policy, SGFormatter, InitializationUtility, queryStringParams */

(function () {

    "use strict";


    $(document).ready(function () {

        if (mode !== "view") {
            form_utilities.setFieldsRequiredDisplay();
        } else {
            form_utilities.disableFieldsOnViewMode(mode);
        }

        initializeUI();
        initializeForm();

    });

    function initializeUI() {
        InitializationUtility.initializeDatePickers();
    }

    function initializeForm() {
        form_utilities.moduleUrl = baseUrl + "/HRIS/employees";
        form_utilities.updateObjectId = policy.code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();
