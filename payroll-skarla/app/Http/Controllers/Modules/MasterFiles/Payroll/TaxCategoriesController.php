<?php

namespace App\Http\Controllers\Modules\MasterFiles\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\TaxCategory;
use Yajra\Datatables\Facades\Datatables;

class TaxCategoriesController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.master-files.payroll.tax-categories.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(TaxCategory::query())->make(true);
    }

}
