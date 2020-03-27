<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Alumno;
use App\Charts\Alumnoreporte;
use DB;
class reports extends Controller
{


    public function indexa(Request $request)
    {
        //$alumnos = DB::table('alumno')->where('genero', 'Masculino');
        //$alumnos2 = DB::table('alumno')->where('genero', 'Femenino');
        //$alumnos = Alumno::pluck('num_cuenta', 'genero');
        //$chart = new Alumnoreporte;

        //$chart -> labels([$alumnos, $alumnos2]);
        //$chart -> dataset('Genero','bar',1,2,3,4);
            
        $result = \DB::table('alumnos')
        ->where('genero','=','Masculino')
        ->get();
        return response()->json($result);



        return view('report.alumno');
    }
    public function indexp()
    {
        return view('report.periodo');
    }

}
