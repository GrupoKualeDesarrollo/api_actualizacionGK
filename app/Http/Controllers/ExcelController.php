<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function consultarInformacion(Request $request)
    {

        $desde = $request->desde;
        $hasta = $request->hasta;
        $empresa = $request->empresa;
        $tipoDocumento = intval($request->tipoDocumento);

        // $datos = ["DATEdesde" => $desde, "DATEhasta" => $hasta, "empresa" => $empresa, "tipoDoc" => $tipoDocumento];

        try {

            switch ($empresa) {
                case '1':
                    $datosConsulta = DB::connection('conexion-ContpaqCARLS-prod')->table('Ingresos')
                        ->select(DB::raw('Folio, Fecha, Concepto, NumPol, Total, OtroMetodoDePago'))
                        ->whereDate('Fecha', '>=', $desde)
                        ->whereDate('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->get();

                    return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
                    break;
                case '2':
                    $datosConsulta = DB::connection('conexion-ContpaqDQ-prod')->table('Ingresos')
                        ->select(DB::raw('Folio, Fecha, Concepto, NumPol, Total, OtroMetodoDePago'))
                        ->where('Fecha', '>=', $desde)
                        ->where('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->get();
                    return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
                    break;
                case '3':

                    if($tipoDocumento === 38){
                        $datosConsulta = DB::connection('conexion-ContpaqTinto-prod')->table('IngresosNoDepositados')
                        ->select(DB::raw('Folio, Fecha, Concepto, Total, OtroMetodoDePago'))
                        ->where('Fecha', '>=', $desde)
                        ->where('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->get();
                    return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
                    }else{
                        $datosConsulta = DB::connection('conexion-ContpaqTinto-prod')->table('Ingresos')
                        ->select(DB::raw('Folio, Fecha, Concepto, NumPol, Total, OtroMetodoDePago'))
                        ->where('Fecha', '>=', $desde)
                        ->where('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->get();
                    return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
                    }

                    
                    break;
            }

            // if ($empresa === "1") {
            //     $datosConsulta = DB::connection('conexion-ContpaqCARLS-prod')->table('Ingresos')
            //         ->select(DB::raw('Folio, Fecha, Concepto, NumPol, Total, OtroMetodoDePago'))
            //         ->whereDate('Fecha', '>=', $desde)
            //         ->whereDate('Fecha', '<=', $hasta)
            //         ->where('TipoDocumento', '=', $tipoDocumento)
            //         ->get();

            //     return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
            // } else {
            //     $datosConsulta = DB::connection('conexion-ContpaqDQ-prod')->table('Ingresos')
            //         ->select(DB::raw('Folio, Fecha, Concepto, NumPol, Total, OtroMetodoDePago'))
            //         ->where('Fecha', '>=', $desde)
            //         ->where('Fecha', '<=', $hasta)
            //         ->where('TipoDocumento', '=', $tipoDocumento)
            //         ->get();
            //     return response()->json(["respuesta" => 1, "mensaje" => "Datos encontrados", "datos" => $datosConsulta]);
            // }

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Ocurrio un error " . $th->getMessage()]);
        }
    }

    public function actualizarInformacion(Request $request)
    {

        $desde = $request->desde;
        $hasta = $request->hasta;
        $empresa = $request->empresa;
        $tipoDocumento = intval($request->tipoDocumento);

        $metodoNuevo = '';

        try {

            switch ($empresa) {
                case '1':

                    switch ($tipoDocumento) {
                        case '56':
                            $metodoNuevo = '03';
                            break;
                        case '57':
                            $metodoNuevo = '99';
                            break;
                        case '58':
                            $metodoNuevo = '28';
                            break;
                    }

                    $datosActualizar = DB::connection('conexion-ContpaqCARLS-prod')->table('Ingresos')
                        ->whereDate('Fecha', '>=', $desde)
                        ->whereDate('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->update([
                            'OtroMetodoDePago' => $metodoNuevo
                        ]);

                    return response()->json(["respuesta" => 1, "mensaje" => "Actualizados Correctamente"]);
                    break;
                case '2':

                    switch ($tipoDocumento) {
                        case '56':
                            $metodoNuevo = '03';
                            break;
                        case '57':
                            $metodoNuevo = '99';
                            break;
                        case '58':
                            $metodoNuevo = '28';
                            break;
                    }

                    $datosActualizar = DB::connection('conexion-ContpaqDQ-prod')->table('Ingresos')
                        ->whereDate('Fecha', '>=', $desde)
                        ->whereDate('Fecha', '<=', $hasta)
                        ->where('TipoDocumento', '=', $tipoDocumento)
                        ->update([
                            'OtroMetodoDePago' => $metodoNuevo
                        ]);

                    return response()->json(["respuesta" => 1, "mensaje" => "Actualizados Correctamente"]);
                    break;
                case '3':

                    switch ($tipoDocumento) {
                        case '38':
                            $metodoNuevo = '01';
                            
                            $datosActualizar = DB::connection('conexion-ContpaqTinto-prod')->table('IngresosNoDepositados')
                                ->whereDate('Fecha', '>=', $desde)
                                ->whereDate('Fecha', '<=', $hasta)
                                ->where('TipoDocumento', '=', $tipoDocumento)
                                ->update([
                                    'OtroMetodoDePago' => $metodoNuevo,
                                    'CodigoPersona' => '14',
                                    'BeneficiarioPagador' => "PUBLICO EN GENERAL"
                                ]);

                            break;
                        case '56' || '58':
                            $metodoNuevo = '04';
                            $datosActualizar = DB::connection('conexion-ContpaqTinto-prod')->table('Ingresos')
                                ->whereDate('Fecha', '>=', $desde)
                                ->whereDate('Fecha', '<=', $hasta)
                                ->where('TipoDocumento', '=', $tipoDocumento)
                                ->update([
                                    'OtroMetodoDePago' => $metodoNuevo
                                ]);
                            break;
                        case '57' || '59':
                            $metodoNuevo = '28';
                            $datosActualizar = DB::connection('conexion-ContpaqTinto-prod')->table('Ingresos')
                                ->whereDate('Fecha', '>=', $desde)
                                ->whereDate('Fecha', '<=', $hasta)
                                ->where('TipoDocumento', '=', $tipoDocumento)
                                ->update([
                                    'OtroMetodoDePago' => $metodoNuevo
                                ]);
                            break;
                    }



                    return response()->json(["respuesta" => 1, "mensaje" => "Actualizados Correctamente"]);
                    break;
            }





            // if ($empresa === "1") {
            //     $datosActualizar = DB::connection('conexion-ContpaqCARLS-prod')->table('Ingresos')
            //         ->whereDate('Fecha', '>=', $desde)
            //         ->whereDate('Fecha', '<=', $hasta)
            //         ->where('TipoDocumento', '=', $tipoDocumento)
            //         ->update([
            //             'OtroMetodoDePago' => $metodoNuevo
            //         ]);

            //     return response()->json(["respuesta" => 1, "mensaje" => "Actualizados Correctamente"]);
            // } else {
            //     $datosActualizar = DB::connection('conexion-ContpaqDQ-prod')->table('Ingresos')
            //         ->whereDate('Fecha', '>=', $desde)
            //         ->whereDate('Fecha', '<=', $hasta)
            //         ->where('TipoDocumento', '=', $tipoDocumento)
            //         ->update([
            //             'OtroMetodoDePago' => $metodoNuevo
            //         ]);

            //     return response()->json(["respuesta" => 1, "mensaje" => "Actualizados Correctamente"]);
            // }
        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Ocurrio un error "/* . $th->getMessage()*/]);
        }
    }
}
