<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = ['user_id','evento_id','favorito'];
}
