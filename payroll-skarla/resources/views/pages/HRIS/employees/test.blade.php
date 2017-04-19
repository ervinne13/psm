
@extends("layouts.skarla")

@section('vendor-js')

<script src="{{vendor_url("underscore/underscore.js")}}"></script>
<script src="{{skarla_vendor_url("js/select2.min.js")}}"></script>
<script src="{{skarla_vendor_url("js/bootstrap-select.min.js")}}"></script>
@endsection

@section("content")
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Civil Status</label>
            <select name="civil_status_code" class="selectpicker" required tabindex="6" data-live-search="false">
                @foreach($civilStatusList AS $civilStatus)
                <?php $selected = $civilStatus["code"] == $employee->civil_status_code ? "selected" : "" ?>
                <option value="{{$civilStatus["code"]}}" {{$selected}} >{{$civilStatus["display_name"]}}</option>
                @endforeach
            </select>   
        </div>
    </div>

    <div class="col-lg-4">

        <h5 class="m-t-1">Live Search</h5>
        <p>You can add a search input by passing <kbd>data-live-search=&quot;true&quot;</kbd> attribute:</p>
        <p class="small m-t-2 text-uppercase"><strong>examples</strong></p>
        <select class="selectpicker" data-live-search="true">
            <option>Android</option>
            <option>iOS</option>
            <option>Windows</option>
            <option>Symbian</option>
            <option>Atari TOS</option>
            <option>Amiga OS</option>
            <option>Unix</option>
            <option>Linux</option>
            <option>OSX</option>
        </select>

    </div>
</div>


@endsection
