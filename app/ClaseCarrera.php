<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaseCarrera extends Model
{
    public $timestamps = false;
    protected $table="clase_carreras";
    protected $fillable = ['id_clase','id_carrera'];
}
