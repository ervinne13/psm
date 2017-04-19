<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Policy</label>
            <select class="form-control form-control selectpicker" name="policy_code" data-live-search="true" data-style="btn-primary">
                @foreach($policies AS $policy)
                <?php $selected = $policy->code == $employee->policy_code ? "selected" : "" ?>
                <option value="{{$policy->code}}" {{$selected}} >{{$policy->display_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="policy-payroll-item-table" class="table table-responsive">
            <thead>
                <tr>
                    <th>Payroll Item</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>