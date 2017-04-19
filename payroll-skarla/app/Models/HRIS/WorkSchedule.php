<?php

namespace App\Models\HRIS;

use App\Models\SGModel;

class WorkSchedule extends SGModel {

    public $incrementing  = false;
    protected $table      = "hris.work_schedule";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "display_name"
    ];

    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function workScheduleShifts() {
        return $this->hasMany(WorkScheduleShift::class, "work_schedule_code");
    }

    // </editor-fold>
}
