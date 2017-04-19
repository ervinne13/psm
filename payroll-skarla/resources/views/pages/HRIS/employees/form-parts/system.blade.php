
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Employee Code</label>
            <input type="text" name="code" value="{{$employee->code}}" required class="form-control" tabindex="1">
        </div>
        <div class="form-group">
            <label class="control-label">Position</label>
            <select name="position_code" required class="form-control selectpicker" data-live-search="true" tabindex="2">               
                @foreach($positions AS $position)
                <?php $selected = $employee->position_code == $position->code ? "selected" : "" ?>
                <option value="{{$position->code}}" {{$selected}} >{{$position->display_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Location</label>
            <select name="location_code" required class="form-control selectpicker" data-live-search="true" tabindex="3">
                @foreach($locations AS $location)
                <?php $selected = $employee->location_code == $location->code ? "selected" : "" ?>
                <option value="{{$location->code}}" data-company-code="{{$location->company->code}}" data-company-display-name="{{$location->company->display_name}}"  {{$selected}} >{{$location->display_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Company</label>            
            <input type="text" disabled data-source="company_display_name" value="{{$employee->location->company->display_name}}" class="form-control">
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Basic Salary</label>            
            <input type="text" name="basic_salary" value="{{$employee->basic_salary}}" class="form-control auto-numeric" tabindex="4">
        </div>
        <div class="form-group">
            <label class="control-label">Basic Salary UOM</label>            
            @include('module.payable-uom-select', ["name" => "basic_salary_uom", "value" => $employee->basic_salary_uom, "required" => true])
        </div>
        <div class="form-group">
            <label class="control-label">Tax Category</label>
            <select name="tax_category_code" required class="form-control selectpicker" tabindex="5">
                @foreach($taxCategories AS $taxCategory)
                <?php $selected = $employee->tax_category_code == $taxCategory->code ? "selected" : "" ?>
                <option value="{{$taxCategory->code}}" {{$selected}} >{{$taxCategory->display_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Payroll Type</label>
            <select name="payroll_type_code" required class="form-control selectpicker" tabindex="6">
                @foreach($payrollTypes AS $payrollType)
                <?php $selected = $employee->payroll_type_code == $payrollType->code ? "selected" : "" ?>
                <option value="{{$payrollType->code}}" {{$selected}} >{{$payrollType->display_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>