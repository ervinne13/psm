<?php $uses = ["form", "datepicker", "select2"] ?>

@extends('layouts.skarla')

@section('vendor-js')

<script src="{{vendor_url("underscore/underscore.js")}}"></script>
<script src="{{vendor_url("autoNumeric/autoNumeric.js")}}"></script>

@endsection

@section('js')

@include('pages.HRIS.employees.form-parts.work-schedule-row-template')
@include('pages.HRIS.employees.form-parts.policy-payroll-item-row-template')

<script type="text/javascript">
var employee = JSON.parse('{!! $employee !!}');
var mode = '{{$mode}}';
</script>

<script src="{{url("js/view-presenters/HRIS/EmployeeWorkScheduleViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/HRIS/EmployeePolicyTableViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/master-files/LocationSelectViewPresenter.js")}}"></script>
<script src="{{url("js/pages/HRIS/employees/form.js")}}"></script>
@endsection

@section('content')

<div class="row m-b-2">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <h4 class="m-b-0 ">Employee <small>{{$mode}}</small></h4>
    </div>           
</div> 

<form class="fields-container">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default shadow-box p-a-0">
                <div class="panel-body p-a-0">

                    <ul class="nav nav-tabs tab-color-white">
                        <li role="presentation" class="active">
                            <a aria-expanded="true" data-toggle="tab" href="#tab-basic" role="tab">Basic</a>
                        </li>
                        <li role="presentation" class="">
                            <a aria-expanded="false" data-toggle="tab" href="#tab-contact" role="tab">Contact</a>
                        </li>
                        <li role="presentation" class="">
                            <a aria-expanded="false" data-toggle="tab" href="#tab-system" role="tab">System</a>
                        </li>
                        <li role="presentation" class="">
                            <a aria-expanded="false" data-toggle="tab" href="#tab-work-schedule" role="tab">Work Schedule</a>
                        </li>
                        <li role="presentation" class="">
                            <a aria-expanded="false" data-toggle="tab" href="#tab-policy-settings" role="tab">Policy Settings</a>
                        </li>
                    </ul>

                    <div class="tab-content bg-white p-a-3">

                        <div class="tab-pane fade p-r-1 active in" id="tab-basic" role="tabpanel">
                            @include('pages.HRIS.employees.form-parts.basic')
                        </div>

                        <div class="tab-pane fade p-r-1" id="tab-contact" role="tabpanel">
                            @include('pages.HRIS.employees.form-parts.contact')
                        </div>

                        <div class="tab-pane fade p-r-1" id="tab-system" role="tabpanel">
                            @include('pages.HRIS.employees.form-parts.system')
                        </div>

                        <div class="tab-pane fade p-r-1" id="tab-work-schedule" role="tabpanel">
                            @include('pages.HRIS.employees.form-parts.work-schedule')
                            @include('pages.HRIS.employees.form-parts.work-schedule-modal')
                        </div>

                        <div class="tab-pane fade p-r-1" id="tab-policy-settings" role="tabpanel">
                            @include('pages.HRIS.employees.form-parts.policy')
                        </div>

                    </div>

                </div>
                <div class="panel-footer">
                    @include('module.form-actions')

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection