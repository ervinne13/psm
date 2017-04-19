<?php

namespace App\Models\MasterFiles;

use App\Models\Searchable;
use App\Models\SGModel;

class Company extends SGModel {

    use Searchable;

    public $incrementing         = false;
    protected $table             = "public.company";
    protected $primaryKey        = "code";
    protected $fillable          = ['code', "display_name"];
    protected $searchableColumns = ['code', "display_name"];

}
