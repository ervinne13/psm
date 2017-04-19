<?php

namespace App\Models\HRIS;

use App\Models\SGModel;

class Position extends SGModel {

    public $incrementing  = false;
    protected $table      = "hris.position";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name", "position_level_code"];

}
