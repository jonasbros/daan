<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function route() {
        return $this->hasMany('App\Route');
    }
}
