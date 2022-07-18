<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'L_SAF_DEPARTAMENTO';

    protected $primaryKey = 'id';

    protected $fillable = [ 'codigo', 'nombre', 'laboratorio'];

    public $timestamps = false;
}
