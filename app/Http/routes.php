<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('log','LogController');
    Route::get('logout', 'LogController@logout');

    Route::group(['middleware' => 'auth'],function (){
        Route::resource('/','HomeController');
        Route::resource('reportes', 'ReportesController@index');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

        //rutas galpones
        Route::resource ('galpones','GalponesController');
        Route::get('galpones/{id}/perfil', [
            'uses' => 'GalponesController@perfil',
            'as' => 'admin.galpones.perfil'
        ]);
        //rutas corrales
        Route::resource ('corrales','CorralesController');
        Route::get('corrales/{id}/perfil', [
            'uses' => 'CorralesController@perfil',
            'as' => 'admin.corrales.perfil',
            function ($id) {
                return 'corral'.$id;
            }

        ]);
        //rutas animales
        Route::resource ('animales','AnimalesController');
        Route::get('animales/{id}/perfil', [
            'uses' => 'AnimalesController@perfil',
            'as' => 'admin.animales.perfil'
        ]);
        //rutas materiales
        Route::resource('materiales','MaterialesController');
        //rutas precios
        Route::resource('precios','PreciosController');
        //rutas historiales
        Route::resource('historiales','HistorialesMedicosController');
        //rutas pesos
        Route::resource('pesos','PesosController');
        //rutas atributos
        Route::resource('atributos','AtributosController');

        //Rutas de administrador
        Route::group(['middleware' => 'admin'],function (){

            //rutas admin usuarios
            Route::resource('users','UsersController');
            Route::get('users/{id}/destroy', [
                'uses' => 'UsersController@destroy',
                'as' => 'admin.users.destroy'
            ]);
            //rutas admin corrales
            Route::post('corrales', [
                'uses' => 'CorralesController@create',
                'as' => 'admin.corrales.create']);
            Route::post('corrales', [
                'uses' => 'CorralesController@store',
                'as' => 'admin.corrales.store']);
            Route::get('corrales/{corrales}/edit', [
                'uses' => 'CorralesController@edit',
                'as' => 'admin.corrales.edit'
            ]);
            Route::get('corrales/{id}/destroy', [
                'uses' => 'CorralesController@destroy',
                'as' => 'admin.corrales.destroy'
            ]);
            Route::get('corrales/{id}/animalcorral', [
                'uses' => 'CorralesController@animalcorral',
                'as' => 'admin.corrales.animalcorral'
            ]);
            //rutas admin galpones
            Route::post('galpones', [
                'uses' => 'GalponesController@store',
                'as' => 'admin.galpones.store']);
            Route::get('galpones/{galpones}/edit', [
                'uses' => 'GalponesController@edit',
                'as' => 'admin.galpones.edit'
            ]);
            Route::get('galpones/{id}/destroy', [
                'uses' => 'GalponesController@destroy',
                'as' => 'admin.galpones.destroy'
            ]);
            Route::get('galpones/{galpones}/corralcreate', [
                'uses' => 'GalponesController@corralcreate',
                'as' => 'admin.galpones.corralcreate'
            ]);
            //rutas admin animales
            Route::get('animales/{animales}/edit', [
                'uses' => 'AnimalesController@edit',
                'as' => 'admin.animales.edit'
            ]);
            Route::get('animales/{id}/destroy', [
                'uses' => 'AnimalesController@destroy',
                'as' => 'admin.animales.destroy'
            ]);
            Route::get('animales/{id}/pesoperfil', [
                'uses' => 'AnimalesController@pesoperfil',
                'as' => 'admin.animales.pesoperfil'
            ]);
            Route::get('animales/{id}/historialperfil', [
                'uses' => 'AnimalesController@historialperfil',
                'as' => 'admin.animales.historialperfil'
            ]);
            //rutas calendario
            Route::resource ('calendarios','CalendariosController');
            Route::get('cargaEventos{id?}','CalendariosController@show');
            Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendariosController@create'));
            Route::post('actualizaEventos','CalendariosController@update');
            Route::post('eliminaEvento','CalendariosController@delete');
            //rutas admin materiales
            Route::get('materiales/{materiales}/edit', [
                'uses' => 'MaterialesController@edit',
                'as' => 'admin.materiales.edit'
            ]);
            Route::get('materiales/{id}/destroy', [
                'uses' => 'MaterialesController@destroy',
                'as' => 'admin.materiales.destroy'
            ]);
            //rutas admin precios
            Route::get('precios/{precios}/edit', [
                'uses' => 'PreciosController@edit',
                'as' => 'admin.precios.edit'
            ]);
            Route::get('precios/{id}/destroy', [
                'uses' => 'PreciosController@destroy',
                'as' => 'admin.precios.destroy'
            ]);
            //rutas admin historiales
            Route::get('historiales/{historiales}/edit', [
                'uses' => 'HistorialesMedicosController@edit',
                'as' => 'admin.historiales.edit'
            ]);
            Route::get('historiales/{id}/destroy', [
                'uses' => 'HistorialesMedicosController@destroy',
                'as' => 'admin.historiales.destroy'
            ]);
            //rutas admin pesos
            Route::get('pesos/{pesos}/edit', [
                'uses' => 'PesosController@edit',
                'as' => 'admin.pesos.edit'
            ]);
            Route::get('pesos/{id}/destroy', [
                'uses' => 'PesosController@destroy',
                'as' => 'admin.pesos.destroy'
            ]);
            //rutas admin atributos corral
            Route::get('atributos/{atributos}/edit', [
                'uses' => 'AtributosController@edit',
                'as' => 'admin.atributos.edit'
            ]);
            Route::get('atributoss/{id}/destroy', [
                'uses' => 'AtributosController@destroy',
                'as' => 'admin.atributos.destroy'
            ]);
        });

    });
});


Route::get('auth/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as'   => 'admin.auth.login'
]);


Route::post('auth/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as'   => 'admin.auth.login'
]);
Route::get('auth/logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as'   => 'admin.auth.logout'
]);



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
