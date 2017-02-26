<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rip extends Model
{
    protected $fillable = ['title', 'players', 'url','level_of_stupidness','place','enemy'];

    public function players() {
        return $this->belongsToMany('App\Player')->withTimestamps();
    }
}
