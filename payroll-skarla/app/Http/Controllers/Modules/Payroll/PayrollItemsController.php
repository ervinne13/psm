<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Policy;
use App\Models\Payroll\PayrollItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PayrollItemsController extends Controller {

    /**     * *************************************************** */
    // <editor-fold defaultstate="collapsed" desc="API Functions">

    public function getRequiresEmployeeAmountJSON($policyCode) {
        $policy = Policy::find($policyCode);
        return $policy->payrollItems()->requiresEmployeeAmount()->get();
    }

    public function getSelectableJSON(Request $request) {
        if ($request->policy_code) {
            return PayrollItem::SelectableByPolicyCode($request->policy_code)->get();

//            $payrollItems = PayrollItem::SelectableByPolicyCode($request->policy_code)->get();
//            foreach($payrollItems  AS $payrollItem) {
//                echo $payrollItem->display_name;
//                echo "<br>";
//                echo "\n";
//            }
        } else {
            return PayrollItem::all();
        }
    }

    // </editor-fold>    

    /**     * *************************************************** */
    // <editor-fold defaultstate="collapsed" desc="REST Functions">

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    // </editor-fold>
}
