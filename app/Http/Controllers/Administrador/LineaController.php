<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Linea;
use App\Proceso;
use Image;
use DB;
use session;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LineaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $lineas= Linea::all();

      return view('Administrador.lineas.index', compact('lineas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $procesos = Proceso::select('id', 'nombre')->get();
    $procesos = $procesos->pluck('nombre', 'id');

      return view('Administrador.lineas.create', compact('procesos'));
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
    $this->validate($request, ['nombre' => 'required','procesos' => 'required']);//, 'imagen' => 'required|mimes:jpeg,bmp,png']);

    $linea = new Linea;
    $linea->nombre = $request->get('nombre');
    $linea->proceso_id = $request->get('procesos');
    if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            Image::make($file)->save( public_path('images/lineas/' . $nombre ) );

            $linea->imagen = $nombre;
        }

    $linea->user = auth()->id();

    //return dd($linea);
    $linea->save();

    return redirect('/linea');
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

    $procesos = Proceso::select('id', 'nombre')->get();
    $procesos = $procesos->pluck('nombre', 'id');

      $linea = Linea::findOrFail($id);

      return view('Administrador.lineas.edit', compact('linea', 'procesos'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
      $this->validate($request, ['nombre' => 'required','procesos' => 'required']);//, 'imagen' => 'required|mimes:jpeg,bmp,png']);

      $linea = Linea::findOrFail($request->linea_id);

      $this->validate($request, ['nombre' => 'required']);

      $linea->nombre = $request->get('nombre');
      $linea->proceso_id = $request->get('procesos');
      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/lineas/' . $nombre ) );

              $linea->imagen = $nombre;
          }

      $linea->user = auth()->id();

      //dd($linea);

      $linea->update();

      return redirect('/linea');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $linea = Linea::findOrFail($id);

      $linea->delete();

      return redirect('/linea');
  }
}
