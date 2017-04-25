
/* global datatable_utilities, baseUrl, session, SGFormatter */

(function () {

    "use strict";

    $(document).ready(function () {
        initializeDatatable();
        datatable_utilities.initializeDeleteAction();
    });

    function initializeDatatable() {
        $('#tax-categories-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/master-files/tax-categories/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'display_name'},
                {data: 'annual_exemption_amount'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function () {
                        return "";
                    }
                },
                {
                    targets: 3,
                    render: function (annualExemptionAmount) {
                        return SGFormatter.formatCurrency(annualExemptionAmount ? annualExemptionAmount : 0);
                    }
                }
            ]
        });
    }

})();
