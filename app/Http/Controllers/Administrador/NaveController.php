<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nave;
use Image;
use DB;
use session;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class NaveController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $naves = Nave::all();

      return view('Administrador.naves.index', compact('naves'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('Administrador.naves.create');
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
    $nave = new Nave;
    $nave->nombre = $request->get('nombre');

    if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            Image::make($file)->save( public_path('images/naves/' . $nombre ) );

            $nave->imagen = $nombre;
        }

    $nave->user = auth()->id();

    //return dd($nave);
    $nave->save();

    return redirect('/naves');
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
      $nave = Nave::findOrFail($id);

      return view('Administrador.naves.edit', compact('nave'));
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
      $nave = Nave::findOrFail($request->nave_id);

      $nave->nombre = $request->get('nombre');

      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/naves/' . $nombre ) );

              $nave->imagen = $nombre;
          }

      $nave->user = auth()->id();

      $nave->update();

      return redirect('/naves');
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
      $nave = Nave::findOrFail($id);

      $nave->delete();

      return redirect('/naves');
  }
}
