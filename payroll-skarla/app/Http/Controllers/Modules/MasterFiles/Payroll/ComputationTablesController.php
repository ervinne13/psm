<?php

namespace App\Http\Controllers\Modules\MasterFiles\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComputationTablesController extends Controller {

    public function index($tableType) {
        $viewData              = $this->getDefaultViewData();
        $viewData["tableType"] = $tableType;
        $viewData["tableName"] = $this->getTableName($tableType);
        return view('pages.master-files.payroll.computation-tables.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(TaxCategory::query())->make(true);
    }

    protected function getTableName($tableType) {
        switch ($tableType) {
            case "tax-table": return "Payroll Tax Table";
            case "sss-table": return "Payroll SSS Table";
            case "philhealth-table": return "Payroll Philhealth Table";
        }
    }

    protected function getTableColumns($tableType) {
        switch ($tableType) {
            case "tax-table": return [];
            case "sss-table": return "Payroll SSS Table";
            case "philhealth-table": return "Payroll Philhealth Table";
        }
    }

}
