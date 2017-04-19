<?php

namespace App\Http\Controllers\Modules\HRIS;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Policy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function view;

class PoliciesController extends Controller {
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
     * @param  int  $code
     * @return Response
     */
    public function edit($code) {
        $viewData           = $this->getDefaultViewData();
        $viewData["policy"] = Policy::find($code);
        $viewData["mode"]   = "edit";

        return view("pages.HRIS.policies.form", $viewData);
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
