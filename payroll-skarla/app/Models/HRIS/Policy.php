<?php

namespace App\Models\HRIS;

use App\Models\HasAuditLogs;
use App\Models\Payroll\PayrollItem;
use App\Models\SGModel;

class Policy extends SGModel {

    use HasAuditLogs;

    public $incrementing  = false;
    protected $table      = "hris.policy";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "display_name", "description", "night_differential_start_time"
    ];

    /**     * *********************************************************** */
    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function payrollItems() {
        return $this->belongsToMany(PayrollItem::class, "hris.policy_payroll_item", "policy_code", "payroll_item_code");
    }

    //  Pivot for payroll items
    public function policyPayrollItems() {
        return $this->hasMany(PolicyPayrollItem::class, "policy_code");
    }

    // </editor-fold>
}
