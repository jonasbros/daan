<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province() {
        $this->belongsTo('App\Province');
    }
}
