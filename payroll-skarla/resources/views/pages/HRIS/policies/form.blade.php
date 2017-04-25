<?php $uses = ["form", "datepicker", "select2"] ?>

@extends('layouts.skarla')

@section('vendor-js')

<script src="{{vendor_url("underscore/underscore.js")}}"></script>

@endsection

@section('js')

@include('templates.default-dropdown-table-actions')
@include('pages.HRIS.policies.policy-payroll-item-row-template')

<script type="text/javascript">
var policy = JSON.parse('{!! $policy !!}');
var selectablePayrollItems = JSON.parse('{!! $selectablePayrollItems !!}');
var mode = '{{$mode}}';
</script>

<script src="{{url("js/pages/HRIS/policies/form.js")}}"></script>
@endsection

@section('content')

@include('pages.HRIS.policies.add-payroll-item-modal')

<div class="row m-b-2">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <h4 class="m-b-0 ">Policy <small>{{$mode}}</small></h4>
    </div>           
</div> 

<form class="fields-container">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default shadow-box">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Code</label>
                                <input type="text" name="code" value="{{$policy->code}}" required class="form-control" tabindex="1" maxlength="30">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Display Name</label>
                                <input type="text" name="display_name" value="{{$policy->display_name}}" required class="form-control" tabindex="2" maxlength="100">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Grace Period (in minutes)</label>
                                <input type="number" name="grace_period_minutes" value="{{$policy->grace_period_minutes}}" required class="form-control" tabindex="3">
                            </div>      
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea name="description" class="form-control" style="height: 180px;" tabindex="4"></textarea>
                            </div>      
                        </div>                        

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            
                            <h4>Applicable Payroll Items</h4>
                            
                            <table id="policy-payroll-item-table" class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="#" id="action-add-payroll-items">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>UOM</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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