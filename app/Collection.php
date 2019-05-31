<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function words()
    {
        return $this->hasMany('App\Word');
    }
}
