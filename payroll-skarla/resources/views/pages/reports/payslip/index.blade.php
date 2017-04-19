

@extends('layouts.skarla')

@section('vendor-js')
@endsection

@section('js')

<script src="{{url("js/view-presenters/PaginatedSelectViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/master-files/CompanySelectViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/master-files/LocationSelectViewPresenter.js")}}"></script>

<script type="text/javascript">

</script>

<script src="{{url("js/pages/reports/payslip/index.js")}}"></script>
@endsection

@section('content')

<div class="row m-t-3">
    <div class="col-lg-4">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">Payslip Setup</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="company">Company</label>
                    <select name="company_code" class="form-control" id="commpany"></select>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location_code" class="form-control" id="location"></select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">Generated Payslip</div>
            <div class="panel-body">
                <h2 class="m-t-0 f-w-300"><sup>$</sup>
                    <span> 706.00</span></h2>
                <i class="fa fa-fw fa-caret-up text-success"></i> <span>$ 871.00</span>
            </div>
        </div>      
    </div>
</div>

@endsection