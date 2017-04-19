
<?php $uses = ["datatables"]; ?>

@extends('layouts.skarla')

@section('js')
<script src="{{url("js/pages/HRIS/employees/index.js")}}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="row m-b-2">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <h4 class="m-b-0 ">Employees</h4>
            </div>
            <div class=" m-t-1 col-md-4  col-sm-4  col-xs-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 text-right">
                <a href="{{url("HRIS/employees/create")}}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Create New
                </a>
            </div>
        </div>

        <div class="panel panel-default b-a-0 p-10 shadow-box">

            @include('module.datatable', [
            "id" => "employees-datatable",
            "columns" => ["", "Code", "Name", "Position", "Contact Numbers"]
            ])
        </div>
    </div>
</div>

@endsection