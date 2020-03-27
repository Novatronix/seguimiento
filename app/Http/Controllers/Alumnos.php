<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumnosImport;
use App\Imports\AlumnosCarreraImport;
use App\Alumno;
use App\AlumnoCarrera;
Use DB;
Use App\Carrera;
Use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Barryvdh\DomPDF\Facade as PDF;

class Alumnos extends Controller
{
    public function index()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
  
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos'=> $alumnos]);

    }
    public function create(){
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $carreras = Carrera::all();
        return view('alumno.create', compact('carreras'));
    }
    
    public function importExcel(Request $request)
    {
        $validatedData = $request->validate([
            'file'=>'required'
        ]);
        
        $file= $request->file('file');
        Excel::import (new AlumnosImport, $file);
        Excel::import(new AlumnosCarreraImport, $file);
        return back()->with('message', 'Importacion completada');
    }

    public function exportPdf(Request $request)
    {
        $alumnos= Alumno::get();
        $pdf=PDF::loadView('pdf.alumnos',compact('alumnos'));
        return $pdf->download('alumnos-list.pdf');
    }

    public function store(Request $request)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'num_cuenta' => 'required|numeric',
            'nombre' => 'min:3|max:120|required|alpha',
            'apellidos' => 'min:4|max:120|required|alpha',
            'fecha_ingreso' => 'min:4|max:120|required|date',
            'genero' => 'min:4|max:120|required|alpha',
            'telefono' => 'required|numeric',
            'id_carrera' => 'min:2|max:120|required',
        ]);

        \DB::beginTransaction();

        try
        {
            $alumnos = new Alumno();
            $alumnos-> num_cuenta = request ('num_cuenta');
            $alumnos-> nombre = request ('nombre');
            $alumnos-> apellidos = request ('apellidos');
            $alumnos-> fecha_ingreso = request ('fecha_ingreso');
            $alumnos-> genero = request ('genero');
            $alumnos-> telefono = request ('telefono');
            $alumnos-> estado = 'Activo';
            \DB::Commit();
            $alumnos->save();

        if($alumnos->save()) {
            
            $ida = $alumnos->num_cuenta;
            $alumno_carrera = new AlumnoCarrera();
            $alumno_carrera -> num_cuenta = $ida;
            $alumno_carrera -> id_carrera = request ('id_carrera');           
            $alumno_carrera->save();
            \DB::Commit();
            return redirect('/alumno');
         
            }
        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
        
    }

  
    public function show($id_alumno)
    {
        return view('alumno.show', ['alumnos' => Alumno::findOrFail($id_alumno)]);

    }

   
    public function edit($id_alumno)
    {
        return view('alumno.edit', ['alumnos' => Alumno::findOrFail($id_alumno)]);

        //
    }

  
    public function update(UserFormRequest $request, $id_alumno)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }

        $validatedData = $request->validate([
            'nombre' => 'min:3|max:120|required|alpha',
            'apellidos' => 'min:4|max:120|required|alpha',
            'fecha_ingreso' => 'min:4|max:120|required|date',
            'genero' => 'min:8|max:9|required|alpha',
            'telefono' => 'min:8|max:120|required|numeric',
        ]);

        \DB::beginTransaction();

        try
        {
            $alumnos =  Alumno::findOrFail($id_alumno);
            $alumnos-> nombre = $request -> get('nombre');
            $alumnos-> apellidos = $request-> get ('apellidos');
            $alumnos-> fecha_ingreso = $request -> get('fecha_ingreso');
            $alumnos-> genero = $request-> get ('genero');
            $alumnos-> telefono = $request -> get('telefono');
            $alumnos-> estado = $request-> get ('estado');
            \DB::Commit();
            $alumnos->update();
    
            return redirect('/alumno');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }

    }

    public function destroy($id_alumno)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $alumnos = Alumno::findOrFail($id_alumno);
        $alumnos->delete();

        return redirect('/alumno');
        //
    }
   

     // Innerjoin Prueba

        ////return DB::table('users')
        //->join('carreras','carreras.id_carrera','=','users.id_carrera')
        //->select('users.name','carreras.nombre_carrera' )
        //->get();
        

        //AlumnoCarrera
      //  return DB::table('alumno_carreras')
      //  -> join('alumnos','alumnos.id_alumno','=','alumno_carreras.id_alumno')
       // -> join('carreras','carreras.id_carrera','=','alumno_carreras.id_carrera')
        //->select('alumnos.nombre', 'carreras.nombre_carrera')
       // ->get();
         //    $carrera = DB::table('users')->where('name', 'John')->value('email');
}
