<?php

namespace App\Models\MasterFiles;

use App\Models\SGModel;

class CostProfitCenter extends SGModel {

    public $incrementing  = false;
    protected $table      = "public.cost_profit_center";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "display_name", "company_code"];

    public function company() {
        return $this->belongsTo(Company::class, "company_code");
    }

}
