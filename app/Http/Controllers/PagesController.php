<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Subtipo;
use App\Servicio;
use App\General;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function sede()
    {
        $sede = Sede::from('T_S_ST as t')
                    ->join('L_SAF_SEDE as s', 's.id', '=', 't.id_sede')
                    ->join('L_SAF_G_TIP_SERVICIO as ts', 'ts.id', '=', 't.id_subtipo')
                    ->join('L_SAF_G_SERVICIO as sv', 'sv.id', '=', 'ts.S_Id')
                    ->join('L_SAF_GENERAL as g', 'g.id', '=', 'sv.G_Id')
                    ->select('s.denominacion', 'g.txt_nom_completo as general', 'sv.txt_nom_completo as servicio', 'ts.txt_nom_completo as subtipo')
                    ->get();
        
        return response()->json($sede);
    }

    public function sedejson()
    {
        $resultado = Sede::with('subtipo')->get();

        
        return response()->json($resultado);
    }
}