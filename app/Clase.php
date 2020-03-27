<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table="clases"; //
    protected $primaryKey = 'id_clase';
  
    protected $fillable = ['id_clase','nombre_clase','requisito'];
}
