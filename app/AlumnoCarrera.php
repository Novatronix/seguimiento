<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoCarrera extends Model
{
    public $timestamps = false;
    protected $table="alumno_carreras";
    protected $fillable = ['num_cuenta','id_carrera'];
}
