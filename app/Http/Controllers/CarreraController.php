<?php

namespace App\Http\Controllers;

use App\Http\Controllers\redirect;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Carrera;

class CarreraController extends Controller
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
            $carreras = Carrera::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $carreras = Carrera::where($criterio, 'like', '%'.$buscar.'%')->orderBy('id', 'desc')->paginate(3);
        }
        
        return[
            'pagination' => [
                'total'         => $carreras->total(),
                'current_page'  => $carreras->currentPage(),
                'per_page'      => $carreras->perPage(),
                'last_page'     => $carreras->lastPage(),
                'from'          => $carreras->firstItem(),
                'to'            => $carreras->lastItem(),
            ],
            'carreras' => $carreras
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
        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->tipo_plan = $request->tipo_plan;
        $carrera->turno_matutino = '0';
        $carrera->turno_vespertino = '0';
        $carrera->turno_nocturno = '0';
        $carrera->num_grados = $request->num_grados;
        $carrera->save();

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
        $carrera = Carrera::findOrFail($request->id);
        $carrera->nombre = $request->nombre;
        $carrera->tipo_plan = $request->tipo_plan;
        $carrera->turno_matutino = '0';
        $carrera->turno_vespertino = '0';
        $carrera->turno_nocturno = '0';
        $carrera->num_grados = $request->num_grados;
        $carrera->save();
    }

    //--------------------MATUTINO-----------------------------
    public function desactivar_matutino(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_matutino = '0';
        $carrera->save();
    }

    public function activar_matutino(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_matutino = '1';
        $carrera->save();
    }

    //--------------------VESPERTINO-----------------------------
    public function desactivar_vespertino(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_vespertino = '0';
        $carrera->save();
    }

    public function activar_vespertino(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_vespertino = '1';
        $carrera->save();
    }

    //--------------------NOCTURNO-------------------------------
    public function desactivar_nocturno(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_nocturno = '0';
        $carrera->save();
    }

    public function activar_nocturno(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $carrera = Carrera::findOrFail($request->id);
        $carrera->turno_nocturno = '1';
        $carrera->save();
    }

}
