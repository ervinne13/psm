<?php

namespace App\Models\Payroll\ComputationTable;

use Illuminate\Database\Eloquent\Model;

class SSS extends Model {

    protected $table      = "payroll.sss_table";
    protected $primaryKey = "salary_bracked_id";
    protected $fillable   = [
        "salary_range_from", "salary_range_to", "monthly_salary_credit", "employees_compensation", "employer_share", "employee_share", "total_contribution"
    ];

}
