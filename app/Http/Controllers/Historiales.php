<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial;
use DB;
use App\Alumno;
use App\Clase;
use App\Periodo;
use App\Http\Requests\UserFormRequest;
use Barryvdh\DomPDF\Facade as PDF;

class Historiales extends Controller
{

    public function index()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $historiales = Historial::all();
        return view('historial.index', ['historiales'=> $historiales]);
        //
    }
    public function create()
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
       
        $periodos = periodo::all();
        $alumnos = alumno::all();
        $clases = clase::all();
        return view('historial.create',compact('alumnos','clases','periodos'));
        
    }

    public function exportPdf(Request $request)
    {
        $historiales= Historial::get();
        $pdf=PDF::loadView('pdf.historiales',compact('historiales'));
        return $pdf->download('historiales-list.pdf');
    }
    

    public function store(Request $request)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'num_cuenta' => 'required',
            'id_clase' => 'required',
            'id_periodo' => 'required',
           
        ]);

        \DB::beginTransaction();

        try
        {
            $historiales = new Historial();
             $historiales-> num_cuenta = request ('num_cuenta');
            $historiales-> id_clase = request ('id_clase');
            $historiales-> id_periodo = request ('id_periodo');
            $historiales->save();
            \DB::Commit();
             return redirect('/historial');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
        
      
        
    }

    
    public function show($id_historial)
    {
        return view('historial.show', ['historiales' => Historial::findOrFail($id_historial)]);

    }

   
    public function edit($id_historial)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $periodos = periodo::all();
        $alumnos = alumno::all();
        $clases = clase::all();
        return view('historial.edit', compact('alumnos','clases','periodos'),['historiales' => Historial::findOrFail($id_historial)]);

        //
    }

  
    public function update(UserFormRequest $request, $id_historial)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'acumulativo' => 'max:100|nullable|numeric',
            'nota_examen1' => 'max:100|nullable|numeric',
            'nota_examen2' => 'max:100|nullable|numeric',
            'nota_final' => 'max:100|nullable|numeric',
            'faltas' => 'max:8|nullable|numeric',
            'comentarios' => 'nullable',
        ]);

        \DB::beginTransaction();

        try
        {
            $historiales =  Historial::findOrFail($id_historial);
            $historiales-> acumulativo = request ('acumulativo');
            $historiales-> nota_examen1 = request ('nota_examen1');
            $historiales-> nota_examen2 = request ('nota_examen2');
            $historiales-> nota_final = request ('nota_final');
            $historiales-> faltas = request ('faltas');
            $historiales-> comentarios = request ('comentarios');
            $historiales->save();
            \DB::Commit();
    
            $historiales->update();
    
            return redirect('/historial');

        }

        catch(\Exception $e)
        {
            \DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
    
        //
    }

    public function destroy($id_historial)
    {
        if(!\Auth::check())
        {
            return redirect('/login');
        }
        $historiales = Historial::findOrFail($id_historial);
        $historiales->delete();

        return redirect('/historial');
    }
        //


    //
}
