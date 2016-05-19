<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = [];

    public function objects()
    {
        return $this->belongsToMany('App\Object')->withPivot('role');
    }
}
