
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" value="{{$employee->email}}" required class="form-control" tabindex="1">
        </div>
        <div class="form-group">
            <label class="control-label">Contact Number 1</label>
            <input type="text" name="contact_number_1" value="{{$employee->contact_number_1}}" required class="form-control" tabindex="2">
        </div>
        <div class="form-group">
            <label class="control-label">Contact Number 2</label>
            <input type="text" name="contact_number_2" value="{{$employee->contact_number_2}}" class="form-control" tabindex="3">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Address</label>
            <textarea name="address" class="form-control" required tabindex="4"></textarea>
        </div>
    </div>
</div>