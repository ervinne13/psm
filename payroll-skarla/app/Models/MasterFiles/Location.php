<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    public $incrementing  = false;
    protected $table      = "public.location";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name", "company_code", "cost_profit_center_code"];

    public function company() {
        return $this->belongsTo(Company::class, "company_code");
    }

    public function costProfitCenter() {
        return $this->belongsTo(CostProfitCenter::class, "cost_profit_center_code");
    }

}
