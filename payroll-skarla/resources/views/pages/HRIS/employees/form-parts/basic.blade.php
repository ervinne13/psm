
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-sm-12 control-label p-a-0">Employee Name <span class="text-danger">*</span></label>
            <div class="col-sm-4 p-l-0">
                <input name="first_name" value="{{$employee->first_name}}" required class="form-control" placeholder="First Name" tabindex="1">
            </div>
            <div class="col-sm-4">
                <input name="middle_name" value="{{$employee->middle_name}}" required class="form-control" placeholder="Middle Name" tabindex="2">
            </div>
            <div class="col-sm-4 p-r-0">
                <input name="last_name" value="{{$employee->last_name}}" required class="form-control" placeholder="Last Name" tabindex="3">
            </div>
        </div>
    </div>

</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Birth Date</label>
            <input name="birth_date" value="{{$employee->birth_date}}" required class="form-control datepicker" tabindex="4">
        </div>
        <div class="form-group">
            <label class="control-label">Gender</label>
            <select name="gender_code" class="form-control selectpicker" required tabindex="5" data-live-search="false">
                @foreach($genderList AS $gender)
                <?php $selected = $gender["code"] == $employee->gender_code ? "selected" : "" ?>
                <option value="{{$gender["code"]}}" {{$selected}} >{{$gender["display_name"]}}</option>
                @endforeach
            </select>            
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Civil Status</label>
            <select name="civil_status_code" class="form-control selectpicker" required tabindex="6" data-live-search="false">
                @foreach($civilStatusList AS $civilStatus)
                <?php $selected = $civilStatus["code"] == $employee->civil_status_code ? "selected" : "" ?>
                <option value="{{$civilStatus["code"]}}" {{$selected}} >{{$civilStatus["display_name"]}}</option>
                @endforeach
            </select>   
        </div>
    </div>
</div>