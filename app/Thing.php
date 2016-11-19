<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = ['title', 'players', 'url'];

    public function players() {
        return $this->belongsToMany('App\Player')->withTimestamps();
    }
}
