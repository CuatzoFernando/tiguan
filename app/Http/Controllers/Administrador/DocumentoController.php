<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Documento;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use \App\Dato;
use \App\Padre;
use Session;
use Storage;
use File;
use Auth;
use Illuminate\Support\Facades\Input;

class DocumentoController extends Controller
{
    public function index(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 10;

      if (!empty($keyword)) {
          $documentos = Documento::where('nombre', 'LIKE', "%$keyword%")
      ->paginate($perPage);
      } else {
          $documentos = Documento::paginate($perPage);
      }
      return view('Administrador.documentos.index', compact('documentos'));
    }

    public function create()
    {
      return view('Administrador.documentos.create');
    }

    /*
    0 => "id"
    1 => "nave"
    2 => "proyecto"
    3 => "proceso"
    4 => "linea"
    5 => "afo"
    6 => "v1"
    7 => "nombre_del_padre"
    8 => "modeloro_bemi_padre"
    9 => "descripcion"
    10 => "cantidad_padres"
    11 => "v2"
    12 => "nombre_de_equipoelemento"
    13 => "marca_equipoelemento"
    14 => "modelo_de_equipotype"
    15 => "ro_seriefabr_nr"
    16 => "descripcion_complementaria"
    17 => "ro_de_parte_vwmaximo"
    18 => "cantidad_elementos"
    19 => "v3"
    20 => "nomenclatura_del_equiporobotdispositivo"
    21 => "no_de_tablero_o_etiqueta"
    22 => "observaciones"
    23 => "ro_de_inventario"
    */

    public function storeAfos(Request $request)
	  {

      $this->validate($request, array(
        'naves'     => 'required',
        'procesos'  => 'required',
        'lineas'    => 'required',
        'nombre'    => 'required|unique:documentos',
        'Excel'     => 'required'
      ));

       $archivo = $request->file('Excel');
       //$nombre_original=$archivo->getClientOriginalName();
       $nombre_original = $request->get('nombre');
	     $extension=$archivo->getClientOriginalExtension();
       $nuevo_nombre= $nombre_original.".".$extension;
       $r1=Storage::disk('archivos')->put($nuevo_nombre,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nuevo_nombre;

       if ($extension == "xlsx" || $extension == "xls" || $extension == "csv" || $extension == "xps"
           || $extension == "ods" || $extension == "dbf" || $extension == "xlr" || $extension == "xlw"
           || $extension == "xla" || $extension == "xlam" || $extension == "xml" || $extension == "xlt"
           || $extension == "xltm" || $extension == "xltx" || $extension == "xlsb" || $extension == "xlsm") {

              $headers_original = ((((Excel::load($ruta))->all())->first())->keys())->toArray();
              //return dd($haders_original);
              $array = ['id','nave', 'proyecto', 'proceso', 'linea', 'afo','v1','nombre_del_padre','modeloro_bemi_padre',
                                          'descripcion', 'cantidad_padres', 'v2','nombre_de_equipoelemento', 'marca_equipoelemento', 'modelo_de_equipotype',
                                          'ro_seriefabr_nr', 'descripcion_complementaria', 'ro_de_parte_vwmaximo', 'cantidad_elementos', 'v3','nomenclatura_del_equiporobotdispositivo',
                                          'no_de_tablero_o_etiqueta', 'observaciones', 'ro_de_inventario'];

              if ($headers_original != $array) {
                session()->flash('msg', 'Los datos no coinciden.');
                return redirect()->back();
              } else {

                Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
                      // get all rows from the sheet
                      $id = $reader->get(array('id'));

                      if (is_array($id))
                       {
                           Dato::destroy($id);
                       }
                       else
                       {
                           DB::table('datos')->whereIn('id', $id)->delete();
                       }

                    });

                    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
                       })->get();
                       if(!empty($data) && $data->count()){
                           foreach ($data as $key => $value) {
                               $user = Auth::user();

                               Dato::updateOrCreate([
                                   //'id' => $value->id,
                                   'NAVES' => $request->get('naves'),
                                   'PROYECTO' => $value->proyecto,
                                   'PROCESOS' => $request->get('procesos'),
                                   'LINEAS' => $request->get('lineas'),
                                   'AFOS' => $request->get('afos'),
                                   'NOMBREPADRE' => $value->nombre_del_padre,
                                   'MODELOBEMIPADRE' => $value->modeloro_bemi_padre,
                                   'DESCRIPCION' => $value->descripcion,
                                   'CANTPADRES' => $value->cantidad_padres,
                                   'NOMBREEQUIPO' => $value->nombre_de_equipoelemento,
                                   'MARCAEQUIPO' => $value->marca_equipoelemento,
                                   'TYPE' => $value->modelo_de_equipotype,
                                   'NUMSERIE' => $value->ro_seriefabr_nr,
                                   'DESCRIPCIONCOMPLEMENTARIA' => $value->descripcion_complementaria,
                                   'MAXIMO' => $value->ro_de_parte_vwmaximo,
                                   'CANTELEMENTO' => $value->cantidad_elementos,
                                   'NOMENCLATURA' => $value->nomenclatura_del_equiporobotdispositivo,
                                   'NUMTABLERO'=> $value->no_de_tablero_o_etiqueta,
                                   'OBSERVACIONES' => $value->observaciones,
                                   'NUMINVENTARIO'=> $value->ro_de_inventario
                               ]);
                           }
                       }

                     $documento = new Documento;
                     $documento->padre_id = $request->get('NOMBREPADRE');
                     $documento->nombre = $nuevo_nombre;
                     $documento->user = auth()->id();
                     $documento->save();

                     return redirect('Administracion/documentos');

              }
            }

            else {
              session()->flash('msg', 'El archivo debe ser Excel.');
              return redirect()->back();
       }

    }

    public function storeTransporte(Request $request)
	  {

      $this->validate($request, array(
        'naves'     => 'required',
        'procesos'  => 'required',
        'lineas'    => 'required',
        'nombre'    => 'required|unique:documentos',
        'Excel'     => 'required'
      ));

       $archivo = $request->file('Excel');
       //$nombre_original=$archivo->getClientOriginalName();
       $nombre_original = $request->get('nombre');
	     $extension=$archivo->getClientOriginalExtension();
       $nuevo_nombre= $nombre_original.".".$extension;
       $r1=Storage::disk('archivos')->put($nuevo_nombre,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nuevo_nombre;

       if ($extension == "xlsx" || $extension == "xls" || $extension == "csv" || $extension == "xps"
           || $extension == "ods" || $extension == "dbf" || $extension == "xlr" || $extension == "xlw"
           || $extension == "xla" || $extension == "xlam" || $extension == "xml" || $extension == "xlt"
           || $extension == "xltm" || $extension == "xltx" || $extension == "xlsb" || $extension == "xlsm") {

              $headers_original = ((((Excel::load($ruta))->all())->first())->keys())->toArray();
              //return dd($haders_original);
              $array = ['id','nave', 'proyecto', 'proceso', 'linea', 'v1','nombre_del_padre','modeloro_bemi_padre',
                                          'descripcion', 'cantidad_padres', 'v2','nombre_de_equipoelemento', 'marca_equipoelemento', 'modelo_de_equipotype',
                                          'ro_seriefabr_nr', 'descripcion_complementaria', 'ro_de_parte_vwmaximo', 'cantidad_elementos', 'v3','nomenclatura_del_equiporobotdispositivo',
                                          'no_de_tablero_o_etiqueta', 'observaciones', 'ro_de_inventario'];

              if ($headers_original != $array) {
                session()->flash('msg', 'Los datos no coinciden.');
                return redirect()->back();
              } else {

                Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
                      // get all rows from the sheet
                      $id = $reader->get(array('id'));

                      if (is_array($id))
                       {
                           Dato::destroy($id);
                       }
                       else
                       {
                           DB::table('datos')->whereIn('id', $id)->delete();
                       }

                    });

                    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
                       })->get();
                       if(!empty($data) && $data->count()){
                           foreach ($data as $key => $value) {
                               $user = Auth::user();

                               Dato::updateOrCreate([
                                   //'id' => $value->id,
                                   'NAVES' => $request->get('naves'),
                                   'PROYECTO' => $value->proyecto,
                                   'PROCESOS' => $request->get('procesos'),
                                   'LINEAS' => $request->get('lineas'),
                                   'NOMBREPADRE' => $value->nombre_del_padre,
                                   'MODELOBEMIPADRE' => $value->modeloro_bemi_padre,
                                   'DESCRIPCION' => $value->descripcion,
                                   'CANTPADRES' => $value->cantidad_padres,
                                   'NOMBREEQUIPO' => $value->nombre_de_equipoelemento,
                                   'MARCAEQUIPO' => $value->marca_equipoelemento,
                                   'TYPE' => $value->modelo_de_equipotype,
                                   'NUMSERIE' => $value->ro_seriefabr_nr,
                                   'DESCRIPCIONCOMPLEMENTARIA' => $value->descripcion_complementaria,
                                   'MAXIMO' => $value->ro_de_parte_vwmaximo,
                                   'CANTELEMENTO' => $value->cantidad_elementos,
                                   'NOMENCLATURA' => $value->nomenclatura_del_equiporobotdispositivo,
                                   'NUMTABLERO'=> $value->no_de_tablero_o_etiqueta,
                                   'OBSERVACIONES' => $value->observaciones,
                                   'NUMINVENTARIO'=> $value->ro_de_inventario
                               ]);
                           }
                       }

                     $documento = new Documento;
                     $documento->padre_id = $request->get('NOMBREPADRE');
                     $documento->nombre = $nuevo_nombre;
                     $documento->user = auth()->id();
                     $documento->save();

                     return redirect('Administracion/documentos');

              }
            }

            else {
              session()->flash('msg', 'El archivo debe ser Excel.');
              return redirect()->back();
       }

    }

    public function delete($id)
    {
        $documento = Documento::findOrFail($id);
        $pathToFile=storage_path()."/archivos/".$documento->nombre;

        if(File::exists($pathToFile)) {
          File::delete($pathToFile);
        }
        $documento->delete();

        return redirect('/Administracion/documentos');

    }

    public function download($id){
        $entry = Documento::where('id', '=', $id)->firstOrFail();
        //$pathToFile=storage_path('archivos').$entry->nombre;
        $pathToFile=storage_path()."/archivos/".$entry->nombre;
        return response()->download($pathToFile);
    }

    public function downloader($id){
        $entry = Documento::where('id', '=', $id)->firstOrFail();
        //$pathToFile=storage_path('archivos').$entry->nombre;
        $pathToFile=storage_path()."/archivos/".$entry->nombre;
        return response()->download($pathToFile);
    }

    public function tabla($id, Request $request)
    {
      $documento = Documento::where('padre_id', $id)->get();
      return response()->json($documento);
    }

}
