<?php

namespace App\Http\Controllers\Modules\MasterFiles;

use App\Http\Controllers\Controller;
use App\Models\MasterFiles\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function view;

class CompaniesController extends Controller {

    //
    /**     * *************************************************************** */
    // <editor-fold defaultstate="collapsed" desc="API">

    public function jsonList(Request $request) {

        $filterTerm = trim($request->q);

        $companies = Company::search($filterTerm)
                ->paginate(15);

        return \Response::json($companies);
    }

    // </editor-fold>

    /**     * *************************************************************** */
    // <editor-fold defaultstate="collapsed" desc="REST">

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.master-files.companies.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(Company::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData            = $this->getDefaultViewData();
        $viewData["company"] = new Company();
        $viewData["mode"]    = "create";

        return view("pages.master-files.companies.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $company = new Company($request->toArray());
            $company->save();

            return $company;
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $code
     * @return Response
     */
    public function show($code) {
        $viewData            = $this->getDefaultViewData();
        $viewData["company"] = Company::find($code);
        $viewData["mode"]    = "view";

        return view("pages.master-files.companies.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $code
     * @return Response
     */
    public function edit($code) {
        $viewData            = $this->getDefaultViewData();
        $viewData["company"] = Company::find($code);
        $viewData["mode"]    = "edit";

        return view("pages.master-files.companies.form", $viewData);
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
            $company = Company::find($code);
            $company->fill($request->toArray());
            $company->update();

            return $company;
        } catch (\Exception $e) {

            if ($e->getCode() == 23505) {  //  duplicate primary key
                return response("Company {$request->code} already exists", 500);
            } else {
                return response($e->getMessage(), 500);
            }
        }
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
