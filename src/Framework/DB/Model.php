<?php

namespace Framework\DB;

use Illuminate\Database\Eloquent;

class Model extends Eloquent\Model {

    public static $rules = array();

    public static function boot() {
        parent::boot();

    }

    public function isValid() {
        // coming soon
    }

}
