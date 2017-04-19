<script id="policy-payroll-item-row-template" type="text/html">
    <tr class="policy-payroll-item" data-payroll-item-code="<%= code %>">
        <td><%= display_name %></td>
        <td><%= type_code == "E" ? "Earnings" : "Deduction" %></td>
        <td>
            <div class="form-group m-b-0">
                <input type="text" class="form-control policy-payroll-item-amount" data-payroll-item-code="<%= code %>" >
            </div>
        </td>
    </tr>
</script>