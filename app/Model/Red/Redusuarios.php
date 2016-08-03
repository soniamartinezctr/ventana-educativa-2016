<?php

namespace App\Model\Red;

use Illuminate\Database\Eloquent\Model;

class Redusuarios extends Model
{
     protected $table = 'red_usuarios';
     protected $fillable = array('nombre','correo','pais','localidad','sexo','nacimiento','ocupacion','grado_estudios');
    protected $guarded = array('id_redusuario');
}
