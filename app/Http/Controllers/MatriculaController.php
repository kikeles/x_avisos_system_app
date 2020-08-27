<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Matricula;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if($buscar==''){
            //se crea un array de todo lo que devuelva el metodo
            $matriculas = matricula::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $matriculas = matricula::where($criterio, 'like', '%'.$buscar.'%')->orderBy('id', 'desc')->paginate(3);
        }
        
        return[
            'pagination' => [
                'total'         => $matriculas->total(),
                'current_page'  => $matriculas->currentPage(),
                'per_page'      => $matriculas->perPage(),
                'last_page'     => $matriculas->lastPage(),
                'from'          => $matriculas->firstItem(),
                'to'            => $matriculas->lastItem(),
            ],
            'matriculas' => $matriculas
        ];

    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        //metodo Guardar
        $matricula = new matricula();
        $matricula->carrera_id = $request->carrera_id;
        $matricula->matricula = $request->matricula;
        $matricula->completo = '0';
        $matricula->condicion = '1';
        $matricula->save();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        //actualiza la fila de la tabla seleccionada
        $matricula = matricula::findOrFail($request->id);
        $matricula->carrera_id = $request->carrera_id;
        $matricula->matricula = $request->matricula;
        $matricula->completo = $request->completo;
        $matricula->condicion = $request->condicion;
        $matricula->save();
    }

}
