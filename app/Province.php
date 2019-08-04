<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function cities() {
        $this->hasMany('App\City');
    }
}
