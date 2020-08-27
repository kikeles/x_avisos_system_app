<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //protected $table = 'carreras';


    //asignacion de valores en masa
    protected $fillable = ['carrera_id', 'matricula', 'password', 'completo', 'condicion'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
