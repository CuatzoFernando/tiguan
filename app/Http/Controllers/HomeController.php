<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Proceso;
use App\Linea;
use App\Padre;
use App\Afo;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(Request $request)
   {
       return view('home');

       //dd($lineas);

   }
}
