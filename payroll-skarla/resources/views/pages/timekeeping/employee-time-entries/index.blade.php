
<?php $uses = ["datatables", "datepicker", "select2"]; ?>

@extends('layouts.skarla')

@section('js')

@include('pages.timekeeping.employee-time-entries.employee-time-entry-row-template')

<script src="{{url("js/view-presenters/PaginatedSelectViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/HRIS/EmployeeSelectionViewPresenter.js")}}"></script>

<script src="{{url("js/pages/timekeeping/employee-time-entries/index.js")}}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="row m-b-2">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <h4 class="m-b-0 ">Employee Time Entries</h4>
            </div>
            <div class=" m-t-1 col-md-5 col-sm-5  col-xs-5 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 text-right">
                <div class="col-sm-6">
                    <form id="employee-time-entries-upload-form">
                        <input type="file" name="file" id="employee-time-entries-file">
                    </form>
                </div>
                <button id="action-employee-time-entries-import" class="btn btn-sm btn-primary col-sm-6">
                    <i class="fa fa-upload"></i> Upload Time Entries
                </button>
            </div>
        </div>

        <div class="panel panel-default b-a-0 b-b-1 p-10 m-b-0 shadow-box">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="input-employee-code">Employee</label>
                        <select name="employee_code" id="input-employee-code" class="form-control" required></select>                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="input-date-filter">Date Filter</label>
                        <input type="text" class="form-control" id="input-date-filter" value="" placeholder="Select...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    @include('module.datatable', [
                    "id" => "employee-time-entries-table",
                    "columns" => ["", "Entry Date", "Time In", "Break Out", "Break In", "Time Out"]
                    ])

<!--                    <div class="pull-right">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-pencil"></i> Save / Update Time Entries
                        </button>                
                    </div>-->

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection