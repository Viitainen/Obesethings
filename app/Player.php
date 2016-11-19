<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = ['name','slogan'];

    public function things() {
        return $this->belongsToMany('App\Thing')->withTimestamps();
    }
}
