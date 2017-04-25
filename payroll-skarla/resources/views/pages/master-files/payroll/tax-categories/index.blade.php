
<?php $uses = ["datatables"]; ?>

@extends('layouts.skarla')

@section('js')
<script src="{{url("js/pages/master-files/payroll/tax-categories/index.js")}}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="row m-b-2">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <h4 class="m-b-0 ">Payroll Tax Categories</h4>
            </div>           
        </div>

        <div class="panel panel-default b-a-0 p-10 shadow-box">

            @include('module.datatable', [
            "id" => "tax-categories-datatable",
            "columns" => ["", "Code", "Name / Description", "Exemption"]
            ])

        </div>
    </div>
</div>

@endsection