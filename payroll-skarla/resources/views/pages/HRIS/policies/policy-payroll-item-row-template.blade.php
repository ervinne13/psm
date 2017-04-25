
<script id="policy-payroll-item-row-form-template" type="text/html">
    <tr class="policy-payroll-item-row" data-payroll-item-code="<%= code %>">
        <td>            
            <a class="action-delete-payroll-item hover-clickable" data-payroll-item-code="<%= code %>">
                <i class="fa fa-remove"></i>
            </a>
        </td>
        <td><%= code %></td>
        <td><%= display_name %></td>
        <td><%= type_code == "E" ? "Earnings" : "Deduction" %></td>
        <td><%= computation_uom %></td>
    </tr>
</script>
