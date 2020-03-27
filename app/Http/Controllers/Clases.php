<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
Use DB;
Use App\Carrera;
Use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Imports\ClasesImport;
use App\Imports\ClasesCarreraImport;
use App\Clase;
use App\ClaseCarrera;



class Clases extends Controller
{
    public function index()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
            
        }
        $clases = Clase::all();
        return view('clase.index', ['clases'=> $clases]);
        //
    }
    
    public function create(){
       
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $carreras = Carrera::all();
        $clases= Clase::all();
        return view('clase.create',compact('carreras','clases'));
    }

    public function importExcel(Request $request)
    {
        $validatedData = $request->validate([
            'file'=>'required'
        ]);
        
        $file= $request->file('file');
        Excel::import (new ClasesImport, $file);
        Excel::import(new ClasesCarreraImport, $file);
        return back()->with('message', 'Importacion completada');
    }

    public function store(Request $request)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'id_clase' => 'min:4|max:120|required',
            'nombre_clase' => 'min:4|max:120|required',
            'id_carrera' => 'min:2|max:120|required',
            'requisito' => 'min:4|max:10|nullable',
        ]);
    

        \DB::beginTransaction();

        try
        {
            $clases = new Clase();
            $clases-> id_clase = request ('id_clase');
            $clases-> nombre_clase = request ('nombre_clase');
            $clases-> requisito = request ('requisito');
            \DB::Commit();
            $clases->save();
            
        if($clases->save()) {
            
            $idc = $clases->id_clase;
            $clases_carreras= new ClaseCarrera();
            $clases_carreras -> id_clase = $idc;
            $clases_carreras -> id_carrera = request ('id_carrera');           
            $clases_carreras->save();
            \DB::Commit();
            return redirect('/clase');
         
            }
        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
        
        //
    }

  
    public function show($id_clase)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('clase.show', ['clases' => Clase::findOrFail($id_clase)]);

    }

   
    public function edit($id_clase)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('clase.edit', ['clases' => Clase::findOrFail($id_clase)]);
        //
    }

  
    public function update(UserFormRequest $request, $id_clase)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
           
            'nombre_clase' => 'min:4|max:120|required',
           
        ]);

        
        \DB::beginTransaction();

        try
        {
            $clases =  Clase::findOrFail($id_clase);
            $clases-> nombre_clase = $request -> get('nombre_clase');
            \DB::Commit();
            $clases->update();
            return redirect('/clase');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
        
        //
    }

    public function destroy($id_clase)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $clases = Clase::findOrFail($id_clase);
        $clases->delete();

        return redirect('/clase');
        //
    }

}
