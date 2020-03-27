<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    public $timestamps = false;
    protected $table="periodos"; //
    protected $primaryKey = 'id_periodo';
}
