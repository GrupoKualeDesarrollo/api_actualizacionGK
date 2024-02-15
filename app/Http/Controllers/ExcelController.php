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

        try {
            $conexionCarls = DB::connection('conexion-ContpaqCARLS')->getPdo();

            if ($conexionCarls) {
                return response()->json(["respuesta" => 1, "mensaje" => "Conexión exitosa"]);
            } else {
                return response()->json(["respuesta" => 2, "mensaje" => "Error de conexión"]);
            }
        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error: " . $th->getMessage()]);
        }
    }
}
