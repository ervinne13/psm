
<script type="text/html" id="work-schedule-row-template">

    <tr data-row-state="<%= row_state %>" data-effective-date="<%= effective_date.format(SGFormatter.SERVER_DATE_FORMAT) %>" data-work-schedule-code="<%= work_schedule.code %>">
        <td>
            <a class="action-delete-work-schedule btn btn-link" data-effective-date="<%= effective_date.format(SGFormatter.SERVER_DATE_FORMAT) %>" data-work-schedule-code="<%= work_schedule.code %>">
                <i class="fa fa-remove"></i>
            </a>
        </td>
        <td><%= work_schedule.display_name %></td>
        <td><%= effective_date.format(SGFormatter.DISPLAY_DATE_FORMAT) %></td>
    </tr>

</script>
