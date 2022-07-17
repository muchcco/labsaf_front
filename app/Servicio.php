<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'L_SAF_G_SERVICIO';

    protected $primaryKey = 'id';

    protected $fillable = [ 'G_Id', 'txt_nom_completo', 'txt_nom_corto', 'created_At'];

    public $timestamps = false;
}
