<?php

namespace App\Models\HRIS;

use App\Models\CompositeKeys;
use App\Models\SGModel;

class EmployeePayrollItemAmount extends SGModel {

    use CompositeKeys;

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "hris.employee_payroll_item_amount";
    protected $primaryKey = ["employee_code", "payroll_item_code"];
    protected $fillable   = ["employee_code", "payroll_item_code", "amount"];

}
