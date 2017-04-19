<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SGModel extends Model {

    protected $isActiveField     = "is_active";
    protected $objectDisplayName = "Object";

    public function scopeActive($query) {
        return $query->where($this->isActiveField, true);
    }

    public function scopeFindOr404($query, $primaryKey) {
        //  TODO: add support for composite keys
        try {
            return $query->where($this->primaryKey, $primaryKey)->firstOrFail();
        } catch (ModelNotFoundException $mnfe) {
            abort(404, "{$this->objectDisplayName} with key {$primaryKey} not found.");
        }
    }

}
