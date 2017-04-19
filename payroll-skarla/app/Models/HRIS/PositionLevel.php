<?php

namespace App\Models\HRIS;

use Illuminate\Database\Eloquent\Model;

class PositionLevel extends Model {

    public $incrementing  = false;
    protected $table      = "hris.position_level";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name", "level"];

}
