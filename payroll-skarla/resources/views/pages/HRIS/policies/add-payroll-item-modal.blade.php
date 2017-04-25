<div class="modal fade" id="add-payroll-item-modal" tabindex="-1" role="dialog" aria-labelledby="add-payroll-item-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-a-0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&#xD7;</span>
                </button>
                <h4 class="modal-title" id="add-payroll-item-modal-label">Add New Payroll Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Payroll Item</label>
                            <select class="form-control selectpicker" id="new-payroll-item-code-select">
                                @foreach($selectablePayrollItems AS $payrollItem)
                                <option value="{{$payrollItem->code}}" data-json="{!! $payrollItem !!}">
                                    {{$payrollItem->display_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="action-add-payroll-item">
                    <i class="fa fa-plus"></i> Add Payroll Item
                </button>
            </div>
        </div>
    </div>
</div>