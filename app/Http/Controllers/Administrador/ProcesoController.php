<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proceso;
use App\Proyecto;
use Image;
use DB;
use session;
use Auth;
use App\Nave;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProcesoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $procesos = Proceso::all();

      return view('Administrador.procesos.index', compact('procesos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $proyectos = Nave::select('id', 'nombre')->get();
    $proyectos = $proyectos->pluck('nombre', 'id');

      return view('Administrador.procesos.create', compact('proyectos'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $proceso = new Proceso;
    $proceso->nombre = $request->get('nombre');
    $proceso->nave_id = $request->get('naves');
    if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            Image::make($file)->save( public_path('images/procesos/' . $nombre ) );

            $proceso->imagen = $nombre;
        }

    $proceso->user = auth()->id();

    //return dd($proceso);
    $proceso->save();

    return redirect('/Administracion/proceso');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $naves = Nave::select('id', 'nombre')->get();
    $naves = $naves->pluck('nombre', 'id');

    $proceso = Proceso::findOrFail($id);

      return view('Administrador.procesos.edit', compact('proceso', 'naves'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request)
  {
      $proceso = Proceso::findOrFail($request->procesos_id);

      $proceso->nombre = $request->get('nombre');
      $proceso->nave_id = $request->get('naves');
      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/procesos/' . $nombre ) );

              $proceso->imagen = $nombre;
          }

      $proceso->user = auth()->id();

      $proceso->update();

      return redirect('/Administracion/proceso');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */


//////   IMPORTANTE


// PROBLEMA CUANDO SE ELIMINA UN PROCESO

  public function destroy($id)
  {
      $proceso = Proceso::findOrFail($id);

      $proceso->delete();

      return redirect('/Administracion/proceso');
  }
}
