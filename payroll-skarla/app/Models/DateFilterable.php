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
trait DateFilterable {

    public function scopeDateRange($query, $from, $to) {
        if (isset($this->dateField)) {
            return $query
                            ->where($this->dateField, ">=", $from)
                            ->where($this->dateField, "<=", $to);
        } else {
            return $query;
        }
    }

}
