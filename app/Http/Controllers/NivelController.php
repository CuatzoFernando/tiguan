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
use App\Dato;
use App\Padre;

class NivelController extends Controller
{

    public function Naves( $id, Request $request)
    {
        $naves = \App\Nave::all();
        return response()->json($naves);
    }

    public function Proceso($id, Request $request)
    {
      $data = Proceso::where('nave_id', $id)->get();
      return response()->json($data);
    }

    public function Linea($id, Request $request)
    {
      $data = Linea::where('proceso_id', $id)->get();
      return response()->json($data);
    }

    public function Afo($id, Request $request)
    {
      $data = Afo::where('linea_id', $id)->get();
      return response()->json($data);
    }

    public function Padre($id, Request $request)
    {
      //$data = DB::table('padres')->select('NOMBREPADRE')->where('afo_id', '=', $id)->get();
      $data = Padre::where('afo_id', $id)->get();
      return response()->json($data);
    }

    public function Transporte($id, Request $request)
    {
      $data = Padre::where('linea_id', $id)->get();
      return response()->json($data);
    }
}
