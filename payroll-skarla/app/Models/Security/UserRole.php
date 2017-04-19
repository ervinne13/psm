<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    public $timestamps    = false;
    protected $table      = "security.user_role";
    protected $primaryKey = ["username", "role_code"];

}
