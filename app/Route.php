<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function tags() {
        return $this->hasOne('App\Tag');
    }
 }
