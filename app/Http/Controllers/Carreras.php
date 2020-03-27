<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CarrerasImport;
use App\Carrera;
use App\Http\Requests\UserFormRequest;


class Carreras extends Controller
{
    public function index()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $carreras = Carrera::all();
        return view('carrera.index', ['carreras'=> $carreras]);
        //
    }
    public function create(){
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('carrera.create');
    }
    public function importExcel(Request $request)
    {
        $file= $request->file('file');
        Excel::import (new CarrerasImport, $file);

        return back()->with('message', 'Importacion completada');
    }

    public function store(Request $request)
    {
       
        if(!\Auth::check())
        {
            return redirect('/login');
        }        

        \DB::beginTransaction();

        try
        {
            $carreras = new Carrera();
            $carreras-> id_carrera = request ('id_carrera');
            $carreras-> nombre_carrera = request ('nombre_carrera');
            \DB::Commit();
            $carreras->save();
            return redirect('/carrera');
        }
        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
        
      
    }

  
    public function show($id_carrera)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('carrera.show', ['carreras' => Carrera::findOrFail($id_carrera)]);

    }

   
    public function edit($id_carrera)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('carrera.edit', ['carreras' => Carrera::findOrFail($id_carrera)]);

        //
    }

  
    public function update(UserFormRequest $request, $id_carrera)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }

        \DB::beginTransaction();

        try
        {
            $carreras = Carrera::findOrFail($id_carrera);
            $carreras-> nombre_carrera = $request-> get ('nombre_carrera');
            \DB::Commit();
            $carreras->update();
            return redirect('/carrera');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }

    }

    public function destroy($id_carrera)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $carreras = Carrera::findOrFail($id_carrera);
        $carreras->delete();

        return redirect('/carrera');
        //
    }
    public function import(Request $request){
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back() -> with('message', 'Se importo los datos');
    }
}
