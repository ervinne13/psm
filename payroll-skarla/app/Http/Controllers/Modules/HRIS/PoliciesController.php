<?php

namespace App\Http\Controllers\Modules\HRIS;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Policy;
use App\Models\HRIS\PolicyPayrollItem;
use App\Models\Payroll\PayrollItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class PoliciesController extends Controller {
    //
    /**     * *************************************************** */
    // <editor-fold defaultstate="collapsed" desc="REST Functions">

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.HRIS.policies.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(Policy::query())->make(true);
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
        try {
            DB::beginTransaction();
            $policy = new Policy();
            $this->savePolicy($policy, $request);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage());
        }
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
     * @param  int  $code
     * @return Response
     */
    public function edit($code) {
        $viewData           = $this->getDefaultFormViewData($code);
        $viewData["policy"] = Policy::with('payrollItems')->find($code);
        $viewData["mode"]   = "edit";

//        return $viewData["policy"];

        return view("pages.HRIS.policies.form", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $code
     * @return Response
     */
    public function update(Request $request, $code) {

        try {
            DB::beginTransaction();
            $policy = Policy::find($code);
            $this->savePolicy($policy, $request);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage());
        }
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
    }

    // </editor-fold>

    /**     * *************************************************** */
    // <editor-fold defaultstate="collapsed" desc="Local Functions">

    protected function getDefaultFormViewData($policyCode = null) {
        $viewData = $this->getDefaultViewData();

        $viewData["selectablePayrollItems"] = $this->getSelectablePayrollItems($policyCode);

        return $viewData;
    }

    protected function savePolicy(Policy $policy, Request $request) {
        $policy->fill($request->toArray());
        $policy->save();

        if ($request->payroll_items) {
            //  clear previous payroll items
            PolicyPayrollItem::where("policy_code", $policy->code)->delete();
            //  add the new ones
            foreach ($request->payroll_items AS $payrollItem) {
                $policy->policyPayrollItems()->save(new PolicyPayrollItem([
                    "policy_code"       => $policy->code,
                    "payroll_item_code" => $payrollItem,
                ]));
            }
        }
    }

    protected function getSelectablePayrollItems($policyCode) {
        if ($policyCode) {
            return PayrollItem::SelectableByPolicyCode($policyCode)->get();
        } else {
            return PayrollItem::all();
        }
    }

    // </editor-fold>
}
