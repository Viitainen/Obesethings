<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = ['name','slogan'];

    public function things() {
        return $this->belongsToMany('App\Thing')->latest()->withTimestamps();
    }

    public function rips() {
        return $this->belongsToMany('App\Rip')->latest()->withTimestamps();
    }
}
