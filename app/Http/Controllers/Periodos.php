<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Http\Requests\UserFormRequest;
use App\Imports\UsersImport;

class Periodos extends Controller
{
    public function index()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $periodos = Periodo::all();
        return view('periodo.index', ['periodos'=> $periodos]);
        //
    }
    public function create(){
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('periodo.create');
    }

    public function store(Request $request)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'num_periodo' => 'max:4|required|numeric',
            'semestre' => 'max:2|required|numeric',
            'año' => '|required|numeric|max:2025',
            'descripcion' => 'required|nullable',
        ]);
    

        \DB::beginTransaction();

        try
        {
                 
        $periodos = new Periodo();
        $periodos-> num_periodo = request ('num_periodo');
        $periodos-> semestre = request ('semestre');
        $periodos-> año = request ('año');
        $periodos-> descripcion = request ('descripcion');
        \DB::Commit();
        $periodos->save();

        return redirect('/periodo');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }

       
        
        //
    }

  
    public function show($id_periodo)
    {
        return view('periodo.show', ['periodos' => Periodo::findOrFail($id_periodo)]);

    }

   
    public function edit($id_periodo)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        return view('periodo.edit', ['periodos' => Periodo::findOrFail($id_periodo)]);

        //
    }

  
    public function update(UserFormRequest $request, $id_periodo)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'num_periodo' => 'max:4|required|numeric',
            'semestre' => 'max:2|required|numeric',
            'año' => '|required|numeric|max:2025',
            'descripcion' => 'required|nullable',
        ]);
    

        \DB::beginTransaction();

        try
        {
            $periodos = Periodo::findOrFail($id_periodo);
            $periodos-> num_periodo = $request -> get('num_periodo');
            $periodos-> semestre = $request -> get('semestre');
            $periodos-> año = $request -> get('año');
            $periodos-> descripcion = $request -> get('descripcion');
            \DB::Commit();
            $periodos->update();
    
            return redirect('/periodo');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
    
        //
    }

    public function destroy($id_periodo)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $periodos = Periodo::findOrFail($id_periodo);
        $periodos->delete();

        return redirect('/periodo');
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
