<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Padre;
use App\Linea;
use App\Afo;
use DB;
use Image;
use Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PadresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /*
      if ($request)
      {
          $query=trim($request->get('searchText'));
          $padres = DB::table('padres as p')
           ->leftJoin('lineas as l', 'p.linea_id', '=', 'l.id')
           ->leftJoin('afos as a', 'p.afo_id', '=', 'a.id')
           ->select('p.id','l.nombre as linea', 'a.nombre as afo', 'p.NOMBREPADRE', 'p.imagen')
           //->where('afo','LIKE','%'.$query.'%')
           //->where('linea','LIKE','%'.$querylinea_id.'%')
           ->orwhere('p.NOMBREPADRE','LIKE','%'.$query.'%')
           ->paginate(10);
          //return view('Administrador.padres.index', compact('padres'));
          return view('Administrador.padres.index',["padres"=>$padres,"searchText"=>$query]);
      }*/

      $keyword = $request->get('searchText');
      $perPage = 10;

      if (!empty($keyword)) {
          //$afos = Afo::where('nombre', 'LIKE', "%$keyword%")
          $padres = DB::table('padres as p')
           ->leftJoin('lineas as l', 'p.linea_id', '=', 'l.id')
           ->leftJoin('afos as a', 'p.afo_id', '=', 'a.id')
           ->select('p.id','l.nombre as linea', 'a.nombre as afo', 'p.NOMBREPADRE', 'p.imagen')
           ->orwhere('p.NOMBREPADRE','LIKE','%'.$keyword.'%')
      ->paginate($perPage);
      } else {
        $padres = DB::table('padres as p')
         ->leftJoin('lineas as l', 'p.linea_id', '=', 'l.id')
         ->leftJoin('afos as a', 'p.afo_id', '=', 'a.id')
         ->select('p.id','l.nombre as linea', 'a.nombre as afo', 'p.NOMBREPADRE', 'p.imagen')
         ->paginate($perPage);
      }
      //return view('Administrador.afos.index', compact('afos'));
      return view('Administrador.padres.index',["padres"=>$padres,"searchText"=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.padres.create');
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
      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/padres/' . $nombre ) );

              DB::table('padres')->insert([
                'NOMBREPADRE' => $request->NOMBREPADRE,
                'linea_id' => $request->lineas,
                'afo_id' => $request->afos,
                'imagen' => $nombre,

              ]);
          }
          else {

            DB::table('padres')->insert([
              'NOMBREPADRE' => $request->NOMBREPADRE,
              'linea_id' => $request->lineas,
              'afo_id' => $request->afos,
            ]);
          }

        return redirect('/Administracion/padres');
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
        $padre = Padre::findOrFail($id);

        return view('Administrador.padres.edit', compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($request->file('imagen'))
          {
              $file = $request->file('imagen');
              $nombre = $file->getClientOriginalName();
              Image::make($file)->save( public_path('images/padres/' . $nombre ) );

              DB::table('padres')->where('id', $id)->update(array(
                  'NOMBREPADRE' => $request->NOMBREPADRE,
                  'imagen' => $nombre,
                ));
          }
          else {
            DB::table('padres')->where('id', $id)->update(array(
                'NOMBREPADRE' => $request->NOMBREPADRE
              ));
          }

        return redirect('/Administracion/padres');
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
        $padre = DB::table('padres')->where('id', '=', $id)->delete();

        //$padre->delete();

        return redirect('/Administracion/padres');

        //return dd($padre);

    }
}
