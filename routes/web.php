<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.login'); });
Route::get('login', function () { return view('auth.login'); });
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/logout', 'Auth\LoginController@logout');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**********************************************************************************************/
////////////////////     RUTAS PARA EXRPOTAR A EXCEL

Route::get('/Excel/AfosDetalle/{id}', 'ExcelController@AfosDetalle');
Route::get('/Excel/padres/{id}/{NOMBREPADRE}', 'ExcelController@PadresAfosDetalle');
Route::get('/Excel/transporte/detalle/{id}', 'ExcelController@LineaDetalle');
Route::get('/Excel/padres/transporte/{id}/{NOMBREPADRE}', 'ExcelController@TransporteDetalle');
/***********************************************************************************************/



/***********************************************************************************************/
///////////// peticiones ajax

Route::get('/naves', 'NivelController@Naves');
Route::get('/nivel-proceso/{id}', 'NivelController@Proceso')->name('nivel-proceso');
Route::get('/nivel-linea/{id}', 'NivelController@Linea')->name('nivel-linea');
Route::get('/nivel-afo/{id}', 'NivelController@Afo')->name('nivel-afo');
Route::get('/nivel-padre/{id}', 'NivelController@Padre')->name('nivel-padre');
Route::get('/nivel-padreTransporte/{id}', 'NivelController@Transporte')->name('nivel-padreTransporte');

Route::get('/lineas/{id}', 'MenuIzquierdaController@Lineas')->name('lineas');
Route::get('/afos/{id}', 'MenuIzquierdaController@Afos')->name('Afos');
Route::get('/AfosDetalle/{afo_id}', 'MenuIzquierdaController@AfosDetalle');
Route::get('/padres/{id}', 'MenuIzquierdaController@PadresAfo');
Route::get('/padres/{afo_id}/{NOMBREPADRE}', 'MenuIzquierdaController@PadresAfoDetalle');
Route::get('/transporte/detalle/{linea_id}', 'MenuIzquierdaController@TransporteDetalle');
Route::get('/padres/transporte/{linea_id}/{NOMBREPADRE}', 'MenuIzquierdaController@PadresTransporteDetalle');


Route::post('/crear/dato', 'DatoController@store');
//Route::get('/datos', 'DatosController@index')->name('datos');


Route::get('/Documento/{id}', 'Administrador\DocumentoController@tabla');
Route::get('/Descargar/{id}', 'Administrador\DocumentoController@downloader');

/*************************************************************************************************/

///////////////// grupo de paginas proceso
/*
   Middleware(filtros) son de tipo 'auth', 'web', que son para la authenticacion de usuario, el middleware httpCache es para el uso de cache en las rutas y asi no sobrecargar al servidor con peticion ya realizadas previamente
*/

Route::group(['middleware' => ['auth', 'web']], function(){
  Route::get('/crear/dato', 'DatoController@create');
  Route::post('/crear/dato', 'DatoController@store');
  Route::get('/editar/dato/{id}', 'DatoController@edit');
  Route::post('/update/{id}', 'DatoController@update');
  Route::delete('/delete/{id}', 'DatoController@destroy');


  Route::get('/allLineas', 'DatoController@allLineas');
  Route::get('/allAfos', 'DatoController@allAfos');
  Route::get('/allPadres', 'DatoController@allPadres');

});

Route::group(['middleware' => ['auth', 'web']], function() {
//Route::group(['middleware' => ['auth', 'web', 'httpCache:1']], function() {

  Route::get('/proceso/{id}/{nombre}', 'MenuIzquierdaController@Procesos');
  Route::get('/transporte/{id}/{nombre}', 'MenuIzquierdaController@Transportes');

  ////////////////////     rutas para importar desde excel

  Route::get('/importar', 'ExcelController@create');

  /***********************************************************************************************/

});

///////////////////// grupo de Administracion
Route::group(['middleware' => ['web', 'auth', 'roles'], 'roles' => ['Administrador', 'Coordinador']], function () {
    Route::get('Administracion', function () {
        $users = \App\User::all()->count();

        $roles = \App\Role::all()->count();
        $permissions = \App\Permission::all()->count();

        //$naves = \App\Nave::all()->count();
        //$procesos = \App\Proceso::all()->count();
        $lineas = \App\Linea::all()->count();
        $afos = \App\Afo::all()->count();
        $padres = \App\Padre::all()->count();
        $documentos = \App\Documento::all()->count();

        return view('Administrador.dashboard.dashboard', compact('users', 'roles', 'permissions', 'lineas', 'afos', 'padres', 'documentos'));
        });

        Route::group(['middleware' => 'can:Control_Usuarios'], function(){
          Route::get('usuarios', '\App\Http\Controllers\Administrador\UserController@index');
          Route::get('usuarios/edit/{user_id}', '\App\Http\Controllers\Administrador\UserController@edit');
          Route::patch('usuarios/update/{id}', '\App\Http\Controllers\Administrador\UserController@update');
          Route::get('usuarios/create', '\App\Http\Controllers\Administrador\UserController@create');
          Route::post('usuarios/store', '\App\Http\Controllers\Administrador\UserController@store');
          Route::get('usuarios/delete/{user_id}', '\App\Http\Controllers\Administrador\UserController@destroy');
        });

        //Route::post('usuarios/addRole', '\App\Http\Controllers\Administrador\UserController@addRole');
        //Route::post('usuarios/addPermission', '\App\Http\Controllers\Administrador\UserController@addPermission');
        //Route::get('usuarios/removePermission/{permission}/{user_id}', '\App\Http\Controllers\Administrador\UserController@revokePermission');
        //Route::get('usuarios/removeRole/{role}/{user_id}', '\App\Http\Controllers\Administrador\UserController@revokeRole');

        Route::group(['middleware' => 'can:Control_Roles'], function() {
          Route::get('roles', '\App\Http\Controllers\Administrador\RoleController@index');
          Route::get('roles/edit/{role_id}', '\App\Http\Controllers\Administrador\RoleController@edit');
          Route::post('roles/update', '\App\Http\Controllers\Administrador\RoleController@update');
          Route::get('roles/create', '\App\Http\Controllers\Administrador\RoleController@create');
          Route::post('roles/store', '\App\Http\Controllers\Administrador\RoleController@store');
          Route::get('roles/delete/{role_id}', '\App\Http\Controllers\Administrador\RoleController@destroy');
        });


        //Permisos
        Route::group(['prefix' => '/permissions', 'middleware' => 'can:Control_Permisos'], function() {
          Route::get('/', 'Administrador\PermissionController@index');
          Route::get('/edit/{role_id}', 'Administrador\PermissionController@edit');
          Route::post('/update', 'Administrador\PermissionController@update');
          Route::get('/create', 'Administrador\PermissionController@create');
          Route::post('/store', 'Administrador\PermissionController@store');
          Route::get('/delete/{role_id}', 'Administrador\PermissionController@destroy');
        });

        //Naves
        Route::group(['prefix' => '/naves'], function() {
          Route::get('/', 'Administrador\NaveController@index');
          Route::get('/edit/{id}', 'Administrador\NaveController@edit');
          Route::post('/update', 'Administrador\NaveController@update');
          Route::get('/create', 'Administrador\NaveController@create');
          Route::post('/store', 'Administrador\NaveController@store');
          Route::get('/delete/{id}', 'Administrador\NaveController@destroy');
        });

        //Procesos
        Route::group(['prefix' => '/Administracion/proceso'], function() {
          Route::get('/', 'Administrador\ProcesoController@index');
          Route::get('/edit/{id}', 'Administrador\ProcesoController@edit');
          Route::post('/update', 'Administrador\ProcesoController@update');
          Route::get('/create', 'Administrador\ProcesoController@create');
          Route::post('/store', 'Administrador\ProcesoController@store');
          Route::get('/delete/{id}', 'Administrador\ProcesoController@destroy');
        });

        //Lineas
        Route::group(['prefix' => '/linea'], function() {
          Route::get('/', 'Administrador\LineaController@index');
          Route::get('/edit/{id}', 'Administrador\LineaController@edit');
          Route::post('/update', 'Administrador\LineaController@update');
          Route::get('/create', 'Administrador\LineaController@create');
          Route::post('/store', 'Administrador\LineaController@store');
          Route::get('/delete/{id}', 'Administrador\LineaController@destroy');
        });

        //Afos
        Route::group(['prefix' => '/Administracion/afo'], function() {
          Route::get('/', 'Administrador\AfoController@index');
          Route::get('/edit/{id}', 'Administrador\AfoController@edit');
          Route::put('/update/{id}', 'Administrador\AfoController@update');
          Route::get('/create', 'Administrador\AfoController@create');
          Route::post('/store', 'Administrador\AfoController@store');
          Route::get('/delete/{id}', 'Administrador\AfoController@destroy');
        });

        //Afos
        Route::group(['prefix' => '/Administracion/padres'], function() {
          Route::get('/', 'Administrador\PadresController@index');
          Route::get('/edit/{id}', 'Administrador\PadresController@edit');
          Route::post('/update/{id}', 'Administrador\PadresController@update');
          Route::get('/create', 'Administrador\PadresController@create');
          Route::post('/store', 'Administrador\PadresController@store');
          //Route::get('/delete/{id}', 'Administrador\PadresController@destroy');
          Route::get('/delete/{id}', 'Administrador\PadresController@destroy');
        });

        // documentos
        Route::group(['prefix' => '/Administracion/documentos'], function(){
          Route::get('/', 'Administrador\DocumentoController@index');
          Route::get('/create', 'Administrador\DocumentoController@create');
          Route::post('/storeAfos', 'Administrador\DocumentoController@storeAfos');
          Route::post('/storeT', 'Administrador\DocumentoController@storeTransporte');
          Route::get('/descargar/{id}', 'Administrador\DocumentoController@download');
          Route::get('/edit/{id}', 'Administrador\DocumentoController@edit');
          Route::patch('/update/{id}', 'Administrador\DocumentoController@update');
          Route::get('/delete/{id}', 'Administrador\DocumentoController@delete');
        });
});
