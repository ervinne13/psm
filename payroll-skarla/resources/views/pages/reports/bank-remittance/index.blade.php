

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
    <div class="col-lg-6">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">Bank Payables to BDO</div>
            <div class="panel-body">

<!--                Total Amount Due
                <h2 class="m-t-0 f-w-300">
                    <sup>P</sup>
                    <span>27,088</span>
                </h2>-->

                <table class="table">
                    <thead>
                        <tr>
                            <th class="small text-muted text-uppercase"><strong>Account Number</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Account Name</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Amount Due</strong></th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">004437713850</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Lizeth Batarao</span></td>
                            <td class="v-a-m"><span>P 5,932.90</span></td>                            
                        </tr>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">004437713830</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Ehmar Villalon</span></td>
                            <td class="v-a-m"><span>P 5,432.90</span></td>                            
                        </tr>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">0044357123530</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Doris Tumulak</span></td>
                            <td class="v-a-m"><span>P 6,432.90</span></td>                            
                        </tr>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">00443732823530</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Gabrielle Flores</span></td>
                            <td class="v-a-m"><span>P 8,292.90</span></td>                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>      
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">Bank Payables to BPI</div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th class="small text-muted text-uppercase"><strong>Account Number</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Account Name</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Amount Due</strong></th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">0044323613850</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Gretchen Garcia</span></td>
                            <td class="v-a-m"><span>P 5,362.90</span></td>                            
                        </tr>
                        <tr>
                            <td class="v-a-m"><span class="text-gray-darker">003647713830</span></td>
                            <td class="v-a-m"><span class="text-gray-darker">Yvonne Yao</span></td>
                            <td class="v-a-m"><span>P 8,432.90</span></td>                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>      
    </div>
</div>

@endsection