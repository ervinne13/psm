<?php

namespace App\Models\HRIS;

use App\Models\CompositeKeys;
use Illuminate\Database\Eloquent\Model;

class PolicyPayrollItem extends Model {

    use CompositeKeys;

    public $incrementing  = false;
    public $timestamps    = false;
    protected $table      = "hris.policy_payroll_item";
    protected $primaryKey = ["policy_code", "payroll_item_code"];
    protected $fillable   = ["policy_code", "payroll_item_code"];

}
