<?php

namespace App\Http\Controllers\Modules\HRIS\ESS;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Shift;
use Illuminate\Http\Request;
use function view;

class WorkScheduleController extends Controller {

    public function setup() {
        $viewData           = $this->getDefaultViewData();
        $viewData["shifts"] = Shift::all();

        return view("pages.HRIS.work-schedule.setup", $viewData);
    }

    public function update(Request $request, $employeeCode) {
        
    }

}
