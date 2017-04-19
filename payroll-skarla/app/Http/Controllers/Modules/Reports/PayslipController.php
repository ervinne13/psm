<?php

namespace App\Http\Controllers\Modules\Reports;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Employee;
use App\Models\MasterFiles\Company;
use function view;

class PayslipController extends Controller {

    public function index() {
        $viewData              = $this->getDefaultViewData();
        $viewData["companies"] = Company::Active();
        $viewData["employees"] = Employee::Active();

        return view("pages.reports.payslip.index", $viewData);
    }

}
