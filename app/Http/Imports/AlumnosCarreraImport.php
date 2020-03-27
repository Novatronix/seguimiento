<?php

namespace App\Imports;

use App\AlumnoCarrera;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosCarreraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AlumnoCarrera([
            //
            'num_cuenta' =>$row[0],
            'id_carrera'=>$row[7],
        ]);
    }
}
