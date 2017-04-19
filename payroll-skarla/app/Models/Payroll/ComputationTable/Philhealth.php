<?php

namespace App\Models\Payroll\ComputationTable;

use Illuminate\Database\Eloquent\Model;

class Philhealth extends Model {

    protected $table      = "payroll.philhealth_table";
    protected $primaryKey = "salary_bracked_id";
    protected $fillable   = [
        "salary_range_from", "salary_range_to", "total_contribution", "employer_share", "employee_share"
    ];

}
