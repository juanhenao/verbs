<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['word', 'translation', 'example', 'type_id', 'collection_id'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
