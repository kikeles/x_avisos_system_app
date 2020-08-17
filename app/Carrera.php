<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //protected $table = 'carreras';


    //asignacion de valores en masa
    protected $fillable = ['nombre', 'tipo_plan', 'turno_matutino', 'turno_vespertino', 'turno_nocturno', 'num_grados'];
}
