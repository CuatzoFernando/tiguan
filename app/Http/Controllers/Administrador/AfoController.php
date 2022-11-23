<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Afo;
use App\Linea;
use App\Proceso;
use Image;
use DB;
use session;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AfoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $keyword = $request->get('search');
    $perPage = 10;

    if (!empty($keyword)) {
        $afos = Afo::where('nombre', 'LIKE', "%$keyword%")
    ->paginate($perPage);
    } else {
        $afos = Afo::paginate($perPage);
    }
    return view('Administrador.afos.index', compact('afos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $lineas = Linea::where('proceso_id', '<', 7);
    $lineas = $lineas->pluck('nombre', 'id');

      return view('Administrador.afos.create', compact('lineas', 'procesos'));
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

    $this->validate($request, ['nombre' => 'required','lineas' => 'required']);//, 'imagen' => 'required|mimes:jpeg,bmp,png']);

    $afo = new Afo;
    $afo->nombre = $request->get('nombre');
    $afo->linea_id = $request->get('lineas');
    if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            Image::make($file)->save( public_path('images/afos/' . $nombre ) );

            $afo->imagen = $nombre;
        }

    $afo->user = auth()->id();

    //return dd($afo);
    $afo->save();

    return redirect('/Administracion/afo');

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
    try {
          $lineas = Linea::all();
          $lineas = $lineas->pluck('nombre', 'id');

          $afo = Afo::findOrFail($id);

          return view('Administrador.afos.edit', compact('afo', 'lineas'));
    }
    catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('error.'.'404');
            }
        }
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
      $this->validate($request, ['nombre' => 'required','lineas' => 'required']);//, 'imagen' => 'required|mimes:jpeg,bmp,png']);

      $afo = Afo::findOrFail($id);

      $afo->nombre = $request->get('nombre');
      $afo->linea_id = $request->get('lineas');

      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/afos/' . $nombre ) );
              $afo->imagen = $nombre;
          }

      $afo->user = auth()->id();

      $afo->update();

      return redirect('/Administracion/afo');
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
    try {
      $afo = Afo::findOrFail($id);

      $afo->delete();

      return redirect('/Administracion/afo');
    }
    catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('error.'.'404');
            }
        }
  }
}
