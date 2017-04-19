<?php

namespace App\Models\HRIS;

use App\Models\CompositeKeys;
use App\Models\SGModel;

class EmployeeWorkSchedule extends SGModel {

    use CompositeKeys;

    public $incrementing  = false;
    public $timestamps    = false;
    protected $table      = "hris.employee_work_schedule";
    protected $primaryKey = ["effective_date", "employee_code"];
    protected $fillable   = ["effective_date", "employee_code", "work_schedule_code"];

    /**
     * Eager loaded relationships
     * @var array 
     */
    protected $with = [
        "workSchedule"
    ];

    /**     * ****************************************************** */
    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function workSchedule() {
        return $this->belongsTo(WorkSchedule::class, "work_schedule_code");
    }

    public function employee() {
        return $this->belongsTo(Employee::class, "employee_code");
    }

    // </editor-fold>

    /**     * ****************************************************** */
    // <editor-fold defaultstate="collapsed" desc="Scopes">

    public function scopeOfEmployee($query, $code) {
        return $query->where("employee_code", $code);
    }

    public function scopeEffectiveDate($query, $effectiveDate) {
        return $query->where("effective_date", $effectiveDate);
    }

    // </editor-fold>
}
