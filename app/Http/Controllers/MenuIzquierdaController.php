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
use Cache;

class MenuIzquierdaController extends Controller
{

  /// procesos que se visualizan dependiendo del nombre,retorna los valores directamente de base de datos
  public function Procesos( $id, $nombre, Request $request)
  {
    $procesos = \App\Proceso::select('id', 'nombre')->where('id', $id)->where('tipo', 'proces')->get();
    $lineas = \App\Linea::where('proceso_id', '=', 0)->orderBy('created_at')->get();
    $afos = \App\Afo::where('linea_id', '=', 0)->orderBy('created_at')->get();
    $padres = \App\Padre::where('afo_id', '=', 0)->orderBy('created_at')->get();

    return view('procesos.procesos', [
                        'procesos' => $procesos,
                        'lineas' => $lineas,
                        'afos' => $afos,
                        'padres' => $padres
                        ]);
  }

  /// procesos que se visualizan dependiendo del nombre,retorna los valores directamente de base de datos
  public function Transportes( $id, $nombre, Request $request)
  {
      $transportes = \App\Proceso::select('id', 'nombre')->where('id', $id)->where('tipo', 'transporte')->get();
      $lineas = \App\Linea::where('proceso_id', '=', 0)->orderBy('created_at')->get();
      $afos = \App\Afo::where('linea_id', '=', 0)->orderBy('created_at')->get();
      $padres = \App\Padre::where('afo_id', '=', 0)->orderBy('created_at')->get();

      return view('procesos.transporte', [
                          'transportes' => $transportes,
                          'lineas' => $lineas,
                          'afos' => $afos,
                          'padres' => $padres
                          ]);

      //dd($name_proceso);

  }


  /// lineas que se visualizan dependiendo del nombre
  public function Lineas( $id, Request $request)
  {
      $linea = \App\Linea::where('id', $id)->get();
      return response()->json($linea);

  }

  public function Afos($id)
  {
    $afo = \App\Afo::where('id', $id)->get();
    return response()->json($afo);
  }

  /// afos que se visualizan dependiendo del id
  public function AfosDetalle($afo_id, Request $request)
  {
      $afo_detalle = \DB::table('datos as d')
          ->join('afos as a', 'a.id', '=', 'd.AFOS')
          ->join('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
          ->join('lineas as l', 'l.id', '=', 'd.LINEAS')
          ->join('naves as n', 'n.id', '=', 'd.NAVES')
          ->select('d.id','n.nombre as nave','d.PROYECTO','pr.nombre as proceso','l.nombre as linea','a.nombre as afo',
                                      'd.NOMBREPADRE','d.MODELOBEMIPADRE','d.DESCRIPCION','d.CANTPADRES','d.NOMBREEQUIPO',
                                      'd.MARCAEQUIPO','d.TYPE','d.NUMSERIE','d.DESCRIPCIONCOMPLEMENTARIA','d.MAXIMO','d.CANTELEMENTO',
                                      'd.NOMENCLATURA','d.NUMTABLERO','d.OBSERVACIONES','d.NUMINVENTARIO')
          ->where('AFOS', '=', $afo_id)
          ->get();

          return response()->json($afo_detalle);

      //dd($afo_detalle);

  }

  // lineas padre que se visualizan dependiendo del nombre

  public function PadresAfo($id, Request $request)
  {
    $padre = DB::table('padres')->where('id','=', $id)->get();
    return response()->json($padre);
  }

  public function PadresAfoDetalle( $afo_id, $NOMBREPADRE, Request $request)
  {
     $padres_detalle = \DB::table('datos as d')
       ->join('afos as a', 'a.id', '=', 'd.AFOS')
       ->join('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
       ->join('lineas as l', 'l.id', '=', 'd.LINEAS')
       ->join('naves as n', 'n.id', '=', 'd.NAVES')
       ->select('d.id','n.nombre as nave','d.PROYECTO','pr.nombre as proceso','l.nombre as linea','a.nombre as afo',
                                   'd.NOMBREPADRE','d.MODELOBEMIPADRE','d.DESCRIPCION','d.CANTPADRES','d.NOMBREEQUIPO',
                                   'd.MARCAEQUIPO','d.TYPE','d.NUMSERIE','d.DESCRIPCIONCOMPLEMENTARIA','d.MAXIMO','d.CANTELEMENTO',
                                   'd.NOMENCLATURA','d.NUMTABLERO','d.OBSERVACIONES','d.NUMINVENTARIO')
       ->where('AFOS', '=', $afo_id)
       ->where('NOMBREPADRE', '=', $NOMBREPADRE)
       ->get();

       return response()->json($padres_detalle);

      //dd($id);

  }

  public function TransporteDetalle($linea_id, Request $request)
  {
    $padres_detalle = DB::table('datos as d')->where('LINEAS','=',$linea_id)
   ->leftJoin('lineas as l', 'd.LINEAS', '=', 'l.id')
   ->leftJoin('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
   ->leftJoin('naves as n', 'n.id', '=', 'd.NAVES')
   ->select('d.id', 'n.nombre as nave', 'd.PROYECTO', 'pr.nombre as proceso','l.nombre as linea',
                               'd.NOMBREPADRE','d.MODELOBEMIPADRE','d.DESCRIPCION','d.CANTPADRES','d.NOMBREEQUIPO',
                               'd.MARCAEQUIPO','d.TYPE','d.NUMSERIE','d.DESCRIPCIONCOMPLEMENTARIA','d.MAXIMO','d.CANTELEMENTO',
                               'd.NOMENCLATURA','d.NUMTABLERO','d.OBSERVACIONES','d.NUMINVENTARIO')
   ->get();
   return response()->json($padres_detalle);
  }

  public function PadresTransportes($id, Request $request)
  {
     $padre = DB::table('padres')->where('id','=', $id)->get();
     return response()->json($padre);
  }

  public function PadresTransporteDetalle($linea_id, $NOMBREPADRE, Request $request)
  {
    $padres_detalle = DB::table('datos as d')->where('LINEAS','=',$linea_id)->where('NOMBREPADRE', '=', $NOMBREPADRE)
   ->leftJoin('lineas as l', 'd.LINEAS', '=', 'l.id')
   ->leftJoin('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
   ->leftJoin('naves as n', 'n.id', '=', 'd.NAVES')
   ->select('d.id', 'n.nombre as nave', 'd.PROYECTO', 'pr.nombre as proceso','l.nombre as linea',
                               'd.NOMBREPADRE','d.MODELOBEMIPADRE','d.DESCRIPCION','d.CANTPADRES','d.NOMBREEQUIPO',
                               'd.MARCAEQUIPO','d.TYPE','d.NUMSERIE','d.DESCRIPCIONCOMPLEMENTARIA','d.MAXIMO','d.CANTELEMENTO',
                               'd.NOMENCLATURA','d.NUMTABLERO','d.OBSERVACIONES','d.NUMINVENTARIO')
   ->get();
   return response()->json($padres_detalle);
  }

}
