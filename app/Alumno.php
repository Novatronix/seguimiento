<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $timestamps = false;
    protected $table="alumnos"; //
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['id_alumno','num_cuenta','nombre','apellidos','fecha_ingreso','genero','telefono','estado'];
}
