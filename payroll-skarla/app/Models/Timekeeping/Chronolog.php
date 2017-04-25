<?php

namespace App\Models\Timekeeping;

use App\Models\CompositeKeys;
use App\Models\DateFilterable;
use App\Models\SGModel;

class Chronolog extends SGModel {

    use CompositeKeys;
    use DateFilterable;

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "payroll.chrono_log";
    protected $primaryKey = ["employee_code", "entry_date"];
    protected $fillable   = ["employee_code", "entry_date", "time_in", "time_out", "break_time_in_1", "break_time_out_1"];
    protected $dateField  = "entry_date";

    public function scopeEmployeeCode($query, $employeeCode) {
        return $query->where("employee_code", $employeeCode);
    }

}
