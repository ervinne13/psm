
/* global datatable_utilities, baseUrl, session */

(function () {

    "use strict";

    $(document).ready(function () {
        initializeDatatable();
        datatable_utilities.initializeDeleteAction();
    });

    function initializeDatatable() {
        $('#companies-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/master-files/companies/datatable"
            },
            order: [2, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'display_name'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {

                        var actions = datatable_utilities.getAllDefaultActions(code);
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                }
            ]
        });
    }

})();
