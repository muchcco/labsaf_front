<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'L_SAF_SEDE';

    protected $primaryKey = 'id';

    protected $fillable = [ 'region', 'imagen', 'denominacion', 'direccion', 'flag', 'created_at' ];

    public $timestamps = false;

    public function sede()
    {
        return $this->hasMany(Sede::class, 'id', 'id');
    }

    public function subtipo()
    {
        return $this->belongsToMany(Sede::class, 'T_S_ST', 'id_sede', 'id_subtipo');
    }

}
