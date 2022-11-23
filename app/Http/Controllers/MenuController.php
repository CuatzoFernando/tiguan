<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use App\Nave;
use App\Proceso;
use App\Linea;
use App\Afo;
use App\Datos;

class MenuController extends Controller
{
  public function Linea( $proceso_id, Request $request)
  {
      $lineas = DB::table('lineas')->where('proceso_id','=', $proceso_id)->get();
      return response()->json($lineas);

  }

  public function Afo( $linea_id, Request $request)
  {
      $lineas = DB::table('afos')->where('linea_id','=', $linea_id)->get();
      return response()->json($lineas);

  }

  public function Padre( $afo_id, Request $request)
  {
      $padres = \App\Padre::where('afo_id', '=', $afo_id)->orderBy('created_at')->get();
      return response()->json($padres);

  }
}
