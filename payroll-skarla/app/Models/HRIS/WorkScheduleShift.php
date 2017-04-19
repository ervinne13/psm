<?php

namespace App\Models\HRIS;

use App\Models\SGModel;

class WorkScheduleShift extends SGModel {

    public $incrementing  = false;
    protected $table      = "hris.work_schedule_shift";
    protected $primaryKey = ["work_schedule_code", "shift_code", "week_day"];
    protected $fillable   = ["work_schedule_code", "shift_code", "week_day"];

}
