<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class EmployeePayrollSummary extends SGModel {

    public $incrementing  = false;
    public $timestamps    = false;
    protected $tabble     = "employee_overtime_summary";
    protected $primaryKey = ["employee_code", "payroll_pay_date"];
    protected $fillable   = ["employee_code", "payroll_pay_date", "monthly_rate", "semi_monthly_rate", "daily_rate", "hourly_rate", "minute_rate", "working_day_count", "present_day_count", "absent_day_count", "half_day_absent_count", "minutes_late"];

}
