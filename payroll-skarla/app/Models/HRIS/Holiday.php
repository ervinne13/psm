<?php

namespace App\Models\HRIS;

use App\Models\SGModel;

class Holiday extends SGModel {

    public $incrementing  = false;
    protected $table      = "hris.holiday";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "display_name", "holiday_type_code", "date_start", "date_end"
    ];

}
