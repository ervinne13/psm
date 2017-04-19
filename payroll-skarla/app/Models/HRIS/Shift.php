<?php

namespace App\Models\HRIS;

use App\Models\SGModel;

class Shift extends SGModel {

    public $incrementing  = false;
    protected $table      = "hris.shift";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "display_name", "scheduled_in", "scheduled_out", "forced_break_minutes", "calendar_color"
    ];

}
