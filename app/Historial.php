<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
    public $timestamps = false;
   // public $incrementing = false;
    protected $table="historiales";
    protected $primaryKey = 'id_historial';
    protected $fillable=['id_historial','num_cuenta','id_clase','id_periodo','acumulativo','nota_examen1','nota_examen2','nota_final','faltas','estado','comentarios'];
}
