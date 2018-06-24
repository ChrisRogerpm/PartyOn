<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $fillable = ['user_id','evento_id','asistente'];
}
