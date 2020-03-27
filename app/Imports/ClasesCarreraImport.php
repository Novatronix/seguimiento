<?php

namespace App\Imports;

use App\ClaseCarrera;
use Maatwebsite\Excel\Concerns\ToModel;

class ClasesCarreraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ClaseCarrera([
            //
            'id_clase' =>$row[0],
            'id_carrera'=>$row[3],
        ]);
    }
}
