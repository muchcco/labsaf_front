<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtipo extends Model
{
    protected $table = 'L_SAF_G_TIP_SERVICIO';

    protected $primaryKey = 'id';

    protected $fillable = [ 'S_Id', 'txt_nom_completo', 'txt_nom_corto', 'created_At'];

    public $timestamps = false;
}
