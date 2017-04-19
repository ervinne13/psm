<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class TaxCategory extends SGModel {

    public $incrementing  = false;
    protected $table      = "payroll.tax_category";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name", "annual_exemption_amount"];

}
