<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class PayrollType extends Model {

    public $incrementing  = false;
    protected $table      = "payroll.payroll_type";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name"];

}
