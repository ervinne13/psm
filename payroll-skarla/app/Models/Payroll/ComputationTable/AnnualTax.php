<?php

namespace App\Models\Payroll\ComputationTable;

use Illuminate\Database\Eloquent\Model;

class AnnualTax extends Model {

    protected $table    = "payroll.annual_tax_table";
    protected $fillable = [
        "over_amount", "under_amount", "tax_due", "tax_due_percent_of_excess"
    ];

}
