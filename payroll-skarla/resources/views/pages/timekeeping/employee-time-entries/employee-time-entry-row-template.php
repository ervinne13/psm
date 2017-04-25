<script id="employee-time-entry-row-template" type="text/html">
    <tr class="employee-time-entry-row" data-employee-code="<%= employee_code %>" data-entry-date="<%= entry_date %>">
        <td></td>
        <td><%= entry_date %></td>
        <td><%= SGFormatter.displayTime(time_in) %></td>        
        <td><%= SGFormatter.displayTime(break_time_out_1) %></td>
        <td><%= SGFormatter.displayTime(break_time_in_1) %></td>        
        <td><%= SGFormatter.displayTime(time_out) %></td>
    </tr>
</script>