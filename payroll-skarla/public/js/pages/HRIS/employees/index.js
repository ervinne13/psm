
/* global datatable_utilities, baseUrl, session */

(function () {

    "use strict";

    $(document).ready(function () {
        initializeDatatable();
        datatable_utilities.initializeDeleteAction();
    });

    function initializeDatatable() {
        $('#employees-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/HRIS/employees/datatable"
            },
            order: [2, "asc"],
            columns: [
                //"columns" => ["", "Code", "Name", "Position", "Email", "Contact Numbers"]
                {data: 'code'},
                {data: 'code'},
                {data: 'first_name'},
                {data: 'position.display_name', name: 'position.display_name'},
                {data: 'contact_number_1'}
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
                    targets: 2,
                    render: function (firstName, display, rowData) {
                        return rowData.first_name + " " + rowData.last_name;
                    }
                },
                {
                    targets: 4,
                    render: function (firstName, display, rowData) {
                        var contacts = [];

                        if (rowData.contact_number_1) {
                            contacts.push(rowData.contact_number_1);
                        }

                        if (rowData.contact_number_2) {
                            contacts.push(rowData.contact_number_2);
                        }

                        return contacts.join(', ');
                    }
                }
            ]
        });
    }

})();
