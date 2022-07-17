<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'L_SAF_GENERAL';

    protected $primaryKey = 'id';

    protected $fillable = [ 'txt_nom_completo', 'txt_nom_corto', 'created_At', 'flag'];

    public $timestamps = false;
}
