<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrationkey extends Model
{
    protected $fillable = ['id', 'key', 'valid_until'];

}
