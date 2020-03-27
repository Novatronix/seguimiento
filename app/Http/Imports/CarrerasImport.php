<?php

namespace App\Imports;

use App\Carrera;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;


class CarrerasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Carrera([
            
            'id_carrera' =>$row[0],
            'nombre_carrera'=>$row[1],
        ]);
    }
}
