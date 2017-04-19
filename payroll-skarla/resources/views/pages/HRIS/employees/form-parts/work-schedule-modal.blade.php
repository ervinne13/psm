

<div id="work-schedule-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content b-a-0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">New Employee Work Schedule</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Work Schedule</label>
                            <select name="work_schedule_code" required class="form-control selectpicker" tabindex="2">
                                @foreach($workSchedules AS $workSchedule)                                
                                <option value="{{$workSchedule->code}}" >{{$workSchedule->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Effective Date</label>
                            <input type="text" class="form-control datepicker" name="effective_date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>IMPORTANT!</h2>

                        <p>
                            You may <strong>NOT</strong> delete a work schedule once it's processed in a payroll and that payroll is closed.
                        </p>

                        <p>
                            You only have the opportunity to modify and/or delete work schedules if that work schedule is not yet processed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button id="action-assign-work-schedule" type="button" class="btn-sm btn btn-success">Assign Work Schedule</button>
                    <button id="action-close-work-schedule" type="button" class="btn-sm btn bg-grey" data-dismiss="modal">Close</button>
                </div>            
            </div>
        </div>
    </div>
</div>