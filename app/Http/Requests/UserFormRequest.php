<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //alumno
          //  'numero_de_cuenta' => 'min:8|max:10|required',
           // 'nombre' => 'min:3|max:120|required',
          //  'apellidos' => 'min:3|max:120|required',
          //  'fecha_ingreso' => 'min:8|max:10|required',
          //  'genero' => 'min:4|max:120|required',
          //  'telefono' => 'min:8|max:9|required',
          //  'estado' => 'min:4|max:120|required',
          //  'id_carrera' => 'min:8|max:120|required',

            //clase
         //   'id_clase' => 'min:8|max:120|required',
         //   'nombre_clase' => 'min:8|max:120|required',
          //  'id_carrera' => 'min:8|max:120|required',

            //historial

            //periodo
           // 'num_periodo' => 'min:8|max:120|required',
           // 'semestre' => 'min:8|max:120|required',
           // 'año' => 'min:4|max:4|required',
           // 'descripcion' => 'min:8|max:220|required' 

            
            
        ];
    }
}
