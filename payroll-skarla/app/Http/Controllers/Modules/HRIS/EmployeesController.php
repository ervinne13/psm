<?php

namespace App\Http\Controllers\Modules\HRIS;

use App\Http\Controllers\Controller;
use App\Models\HRIS\Employee;
use App\Models\HRIS\EmployeePayrollItemAmount;
use App\Models\HRIS\EmployeeWorkSchedule;
use App\Models\HRIS\Policy;
use App\Models\HRIS\Position;
use App\Models\HRIS\WorkSchedule;
use App\Models\MasterFiles\Company;
use App\Models\MasterFiles\Location;
use App\Models\Payroll\PayrollType;
use App\Models\Payroll\TaxCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class EmployeesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.HRIS.employees.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(Employee::with('position'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData = $this->getDefaultFormViewData();

        $viewData["employee"] = $this->getEmployee();
        $viewData["mode"]     = "create";

        $viewData["employee"]->company = new Company();

        return view("pages.HRIS.employees.form", $viewData);
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
        $viewData = $this->getDefaultFormViewData();

        $viewData["employee"] = $this->getEmployee($code);
        $viewData["mode"]     = "edit";

        return view("pages.HRIS.employees.form", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $code
     * @return Response
     */
    public function update(Request $request, $code) {

        $employee = Employee::FindOr404($code);

        try {

            $employee->fill($request->toArray());
            $employee->save();

            if ($request->employeeWorkSchedules) {
                foreach ($request->employeeWorkSchedules AS $ews) {
                    $employee->employeeWorkSchedules()->save(new EmployeeWorkSchedule($ews));
                }
            }

            if ($request->employeePayrollItemAmounts) {
                $employee->payrollItemsAmount()->delete();
                foreach ($request->employeePayrollItemAmounts AS $epia) {
                    $employee->payrollItemsAmount()->save(new EmployeePayrollItemAmount($epia));
                }
            }
        } catch (Exception $e) {
            throw $e;
//            return response($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
    }

    public function destroyWorkSchedule($employeeCode, $effectiveDate) {

        try {
            $eloquentQuery = EmployeeWorkSchedule::OfEmployee($employeeCode)->effectiveDate($effectiveDate);
            $ews           = $eloquentQuery->first();

            if (!isset($ews)) {
                throw new Exception("Work schedule not found. If it displays but this error persist, there must be an error in the effective date. Please contact your administrator.", 404);
            }

            if (!$ews->locked) {
                $eloquentQuery->delete();
                return $ews;
            } else {
                throw new Exception("This work schedule is already locked!");
            }
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    protected function getEmployee($employeeCode = null) {
        if ($employeeCode) {
            $employee = Employee::
                    with('company')
                    ->with('employeeWorkSchedules')
                    ->with('payrollItemsAmount')
                    ->findOr404($employeeCode);
        } else {
            $employee = new Employee();
        }

        return $employee;
    }

    protected function getDefaultFormViewData() {

        $viewData = $this->getDefaultViewData();

        $viewData["locations"]     = Location::with('company')->get();
        $viewData["positions"]     = Position::all();
        $viewData["taxCategories"] = TaxCategory::all();
        $viewData["payrollTypes"]  = PayrollType::all();
        $viewData["policies"]      = Policy::all();
        $viewData["workSchedules"] = WorkSchedule::all();

        $viewData["genderList"] = [
            ["code" => "M", "display_name" => "Male"],
            ["code" => "F", "display_name" => "Female"],
        ];

        $viewData["civilStatusList"] = [
            ["code" => "S", "display_name" => "Single"],
            ["code" => "M", "display_name" => "Married"],
        ];

        return $viewData;
    }

}
