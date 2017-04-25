<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class PayrollItem extends SGModel {

    public $incrementing  = false;
    protected $table      = "payroll.payroll_item";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "type_code", "computation_uom", "payslip_display_name", "is_employee_amount_required", "dependent_on_variable_code", "system_reserved", "taxable"
    ];

    public function scopeRequiresEmployeeAmount($query) {
        return $query->where("is_employee_amount_required", true);
    }

    public function scopeSelectableByPolicyCode($query, $policyCode) {
        return $query->leftJoin('hris.policy_payroll_item', 'payroll_item_code', '=', 'code')
                        ->whereNull('policy_code')
                        ->orWhere('policy_code', '!=', $policyCode)
        ;
    }

}
