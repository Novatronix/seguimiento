<?php

namespace App\Imports;

use App\Clase;
use Maatwebsite\Excel\Concerns\ToModel;

class ClasesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clase([
            
            'id_clase' =>$row[0],
            'nombre_clase'=>$row[1],
            'requisito'=>$row[2],
        ]);
    }
}
