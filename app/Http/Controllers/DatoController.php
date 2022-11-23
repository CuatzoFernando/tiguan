<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dato;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use View;
use Session;
use Validator;
use App\Linea;
use App\Afo;
use App\Padre;

class DatoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = DB::table('datos')
        ->insertGetId(array(
                    'NAVES' => Input::get('naves'),
                    'PROYECTO' => Input::get('PROYECTO'),
                    'PROCESOS' => Input::get('procesos'),
                    'LINEAS' => Input::get('lineas'),
                    'AFOS' => Input::get('afos'),
                    'NOMBREPADRE' => Input::get('NOMBREPADRE'),
                    'MODELOBEMIPADRE' => Input::get('MODELOBEMIPADRE'),
                    'DESCRIPCION' => Input::get('DESCRIPCION'),
                    'CANTPADRES' => Input::get('CANTPADRES'),
                    'NOMBREEQUIPO' => Input::get('NOMBREEQUIPO'),
                    'MARCAEQUIPO' => Input::get('MARCAEQUIPO'),
                    'TYPE' => Input::get('TYPE'),
                    'NUMSERIE' => Input::get('NUMSERIE'),
                    'DESCRIPCIONCOMPLEMENTARIA' => Input::get('DESCRIPCIONCOMPLEMENTARIA'),
                    'MAXIMO' => Input::get('MAXIMO'),
                    'CANTELEMENTO' => Input::get('CANTELEMENTO'),
                    'NOMENCLATURA' => Input::get('NOMENCLATURA'),
                    'NUMTABLERO' => Input::get('NUMTABLERO'),
                    'OBSERVACIONES' => Input::get('OBSERVACIONES'),
                    'NUMINVENTARIO' => Input::get('NUMINVENTARIO'),
                    'user'  => auth()->id()
              ));


        /*
        $this->validate($request, array(
          'naves'     => 'required',
          'procesos'  => 'required',
          'lineas'    => 'required'
        ));

        $dato = new Dato;
        $dato->NAVES = $request->get('naves');
        $dato->PROYECTO = $request->get('PROYECTO');
        $dato->PROCESOS = $request->get('procesos');
        $dato->LINEAS = $request->get('lineas');
        $dato->AFOS = $request->get('afos');
        $dato->NOMBREPADRE = $request->get('NOMBREPADRE');
        $dato->MODELOBEMIPADRE = $request->get('MODELOBEMIPADRE');
        $dato->DESCRIPCION = $request->get('DESCRIPCION');
        $dato->CANTPADRES = $request->get('CANTPADRES');
        $dato->NOMBREEQUIPO = $request->get('NOMBREEQUIPO');
        $dato->MARCAEQUIPO = $request->get('MARCAEQUIPO');
        $dato->TYPE = $request->get('TYPE');
        $dato->NUMSERIE = $request->get('NUMSERIE');
        $dato->DESCRIPCIONCOMPLEMENTARIA = $request->get('DESCRIPCIONCOMPLEMENTARIA');
        $dato->MAXIMO = $request->get('MAXIMO');
        $dato->CANTELEMENTO = $request->get('CANTELEMENTO');
        $dato->NOMENCLATURA = $request->get('NOMENCLATURA');
        $dato->NUMTABLERO = $request->get('NUMTABLERO');
        $dato->OBSERVACIONES = $request->get('OBSERVACIONES');
        $dato->NUMINVENTARIO = $request->get('NUMINVENTARIO');
        $dato->user = auth()->id();
        $dato->nave_id = $request->get('naves');
        $dato->save();
        */

        //return redirect('home');
        //return response()->json(["mensaje" => "Agregado correctamente"]);
        session()->flash('msg', 'Agregado correctamente.');
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

      $datos = DB::table('datos')->where('id',$id)->first();
      $datos =
        [
          'datos' => $datos
        ];
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
      /*
      $validatedData = $request->validate([
        'naves'     => 'required',
        'procesos'  => 'required',
        'lineas'    => 'required',
        'NOMBREPADRE' => 'required'
      ]);

      $datos = DB::table('datos')
      ->where('id', $id)
      ->update(array(
                  'NAVES' => Input::get('naves'),
                  'PROYECTO' => Input::get('PROYECTO'),
                  'PROCESOS' => Input::get('procesos'),
                  'LINEAS' => Input::get('lineas'),
                  'AFOS' => Input::get('afos'),
                  'NOMBREPADRE' => Input::get('NOMBREPADRE'),
                  'MODELOBEMIPADRE' => Input::get('MODELOBEMIPADRE'),
                  'DESCRIPCION' => Input::get('DESCRIPCION'),
                  'CANTPADRES' => Input::get('CANTPADRES'),
                  'NOMBREEQUIPO' => Input::get('NOMBREEQUIPO'),
                  'MARCAEQUIPO' => Input::get('MARCAEQUIPO'),
                  'TYPE' => Input::get('TYPE'),
                  'NUMSERIE' => Input::get('NUMSERIE'),
                  'DESCRIPCIONCOMPLEMENTARIA' => Input::get('DESCRIPCIONCOMPLEMENTARIA'),
                  'MAXIMO' => Input::get('MAXIMO'),
                  'CANTELEMENTO' => Input::get('CANTELEMENTO'),
                  'NOMENCLATURA' => Input::get('NOMENCLATURA'),
                  'NUMTABLERO' => Input::get('NUMTABLERO'),
                  'OBSERVACIONES' => Input::get('OBSERVACIONES'),
                  'NUMINVENTARIO' => Input::get('NUMINVENTARIO'),
                  'user'  => auth()->id()
            ));*/

            $dato = Dato::findOrFail($id);
            $dato->NAVES = $request->get('NAVES');
            $dato->PROYECTO = $request->get('PROYECTO');
            $dato->PROCESOS = $request->get('PROCESOS');
            $dato->LINEAS = $request->get('LINEAS');
            $dato->AFOS = $request->get('AFOS');
            $dato->NOMBREPADRE = $request->get('NOMBREPADRE');
            $dato->MODELOBEMIPADRE = $request->get('MODELOBEMIPADRE');
            $dato->DESCRIPCION = $request->get('DESCRIPCION');
            $dato->CANTPADRES = $request->get('CANTPADRES');
            $dato->NOMBREEQUIPO = $request->get('NOMBREEQUIPO');
            $dato->MARCAEQUIPO = $request->get('MARCAEQUIPO');
            $dato->TYPE = $request->get('TYPE');
            $dato->NUMSERIE = $request->get('NUMSERIE');
            $dato->DESCRIPCIONCOMPLEMENTARIA = $request->get('DESCRIPCIONCOMPLEMENTARIA');
            $dato->MAXIMO = $request->get('MAXIMO');
            $dato->CANTELEMENTO = $request->get('CANTELEMENTO');
            $dato->NOMENCLATURA = $request->get('NOMENCLATURA');
            $dato->NUMTABLERO = $request->get('NUMTABLERO');
            $dato->OBSERVACIONES = $request->get('OBSERVACIONES');
            $dato->NUMINVENTARIO = $request->get('NUMINVENTARIO');
            $dato->user = auth()->id();

            //return dd($request->all());

            $dato->update();

      //return redirect('home');

      return response()->json(["mensaje" => "Actualizado correctamente"]);

      /*
      $links = Session::get('links');
      return redirect($links[2]);
      */

    }

    public function destroy($id)
    {
        if($id!='')
        {
          DB::table('datos')->where('id', $id)->delete();
          session()->flash('msg', 'Eliminado correctamente.');
          //return back();
          return response()->json();
        }
    }


    public function allLineas(Request $request)
    {
      $alls = Linea::all();
      return response()->json($alls);
    }

    public function allAfos()
    {
      $alls = Afo::all();
      return response()->json($alls);
    }

    public function allPadres()
    {
      //$alls = Padre::where('afo_id', $afo_id);
      //return response()->json($alls);
      $alls = DB::table('padres')->distinct()->select('NOMBREPADRE')->get();
      return response()->json($alls);
    }


}
