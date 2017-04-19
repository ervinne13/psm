<?php

namespace App\Http\Controllers\Modules\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankRemittanceController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.reports.bank-remittance.index", $viewData);
    }

}
