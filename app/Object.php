<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $guarded = [];

    public function actors()
    {
        return $this->belongsToMany('App\Actor')->withPivot('role');
    }
}
