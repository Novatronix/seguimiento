<?php

namespace App\Imports;

use App\Alumno;
use App\Alumno_carrera;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            'num_cuenta' =>$row[0],
            'nombre'=>$row[1],
            'apellidos'=>$row[2],
            'fecha_ingreso'=>$row[3],
            'genero'=>$row[4],
            'telefono'=>$row[5],
            'estado'=>$row[6],
        ]);
        
    }
    
}
