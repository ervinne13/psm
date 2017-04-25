<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 *
 * @author ervinne
 */
trait Searchable {

    public function scopeSearch($query, $term) {
        if (isset($this->searchable)) {
            for ($i = 0; $i < count($this->searchable); $i ++) {
                if ($i == 0) {
                    $query = $query->where($this->searchable[$i], 'ilike', "%{$term}%");
                } else {
                    $query = $query->orWhere($this->searchable[$i], 'ilike', "%{$term}%");
                }
            }
        }

        return $query;
    }

}
