
/* global datatable_utilities, baseUrl, session */

(function () {

    "use strict";

    $(document).ready(function () {
        initializeDatatable();
        datatable_utilities.initializeDeleteAction();
    });

    function initializeDatatable() {
        $('#policies-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/HRIS/policies/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'display_name'},
                {data: 'description'}
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
                },
                {
                    targets: 3,
                    render: function (description) {
                        return '<td>' + description + '</dt>';
                    }
                }
            ]
        });
    }

})();
