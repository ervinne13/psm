<?php

namespace App\Http\Controllers\Modules\Timekeeping;

use App\Http\Controllers\Controller;
use App\ImportTemplates\Excel\EmployeeTimeEntriesImport;
use App\Models\Timekeeping\Chronolog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;
use function view;

class EmployeeTimeEntriesController extends Controller {

    //
    /*     * *********************************************************** */
    // <editor-fold defaultstate="collapsed" desc="API Functions">

    public function getJSON(Request $request) {
        return Chronolog::EmployeeCode($request->employeeCode)
                        ->dateRange($request->dateFrom, $request->dateTo)
                        ->get();
    }

    public function importFromExcel(EmployeeTimeEntriesImport $import) {
        try {
            $import->storeEntries();
            return response("Successfully uploaded");
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    // </editor-fold>

    /*     * *********************************************************** */
    // <editor-fold defaultstate="collapsed" desc="REST">

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.timekeeping.employee-time-entries.index", $viewData);
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
