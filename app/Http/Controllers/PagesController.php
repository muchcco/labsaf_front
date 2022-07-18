<?php

namespace App\Http\Controllers;

use DB;
use App\Sede;
use App\Subtipo;
use App\Servicio;
use App\General;
use App\Departamento;
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
        $dep = Departamento::all();


        $responde = [
            "nombres" => 'true',
            "laboratoriso" => $dep
        ];

        return json_encode($responde);
    }

    public function laboratorio()
    {
        $lab = Sede::from('L_LAB as l')
                    ->join('L_SAF_SEDE as s', 's.id', '=', 'l.Id_Sede')
                    ->join('L_SAF_DEPARTAMENTO as d', 'd.id', '=', 's.Id_Departamento')
                    ->select('l.txt_nombre as Nombre', 'l.Ruta', 'd.codigo as codigodepartamento', 'l.codigo', 's.direccion as Direccion', 'l.telefono as Telefono', 'l.correo as Correo', 'l.horario as Horario', 'l.RutaImagen', 'l.Imagenes')
                    ->get();

        return response()->json($lab);
    }

    public function servicios()
    {
        $serv = DB::select("select sv.txt_nom_completo as servicio, 
                                    descripcion = STUFF((
                                                            SELECT ',' + stv.txt_nom_completo
                                                            from L_SAF_G_TIP_SERVICIO stv 
                                                            where stv.S_Id = sv.id
                                                            FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 1, ''),
                                    g.txt_nom_completo as tipoServicio, 
                                    lb.codigo as codigoLaboratorio, 
                                    dp.codigo as codigoDepartamento
                                    
                            from L_S ls
                            inner join L_LAB lb on lb.id = ls.id_lab
                            inner join L_SAF_SEDE s on s.id = lb.Id_Sede
                            inner join L_SAF_DEPARTAMENTO dp on dp.id = s.Id_Departamento
                            inner join L_SAF_G_SERVICIO sv on sv.id = ls.id_serv
                            inner join L_SAF_GENERAL g on g.id = sv.G_Id");

        return response()->json($serv ,200,['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }
    
}