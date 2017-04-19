<?php

namespace App\Models\Payroll\ComputationTable;

use App\Models\SGModel;

class MonthlyTax extends SGModel {

    protected $table    = "payroll.monthly_tax_table";
    protected $fillable = [
        "tax_category_code", "payroll_type_code", "over_amount", "under_amount", "tax_due", "tax_due_percent_of_excess"
    ];

}
