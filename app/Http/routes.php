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
        //rutas usuarios
        Route::resource('users','UsersController');
        Route::get('users/{id}/destroy', [
            'uses' => 'UsersController@destroy',
            'as' => 'admin.users.destroy'
        ]);
        //rutas galpones
        Route::resource ('galpones','GalponesController');
        Route::get('galpones/{id}/perfil', [
            'uses' => 'GalponesController@perfil',
            'as' => 'admin.galpones.perfil'
        ]);
        Route::get('galpones/{id}/destroy', [
            'uses' => 'GalponesController@destroy',
            'as' => 'admin.galpones.destroy'
        ]);
        Route::get('galpones/{id}/corralcreate', [
            'uses' => 'GalponesController@corralcreate',
            'as' => 'admin.galpones.corralcreate'
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
        Route::get('corrales/{id}/destroy', [
            'uses' => 'CorralesController@destroy',
            'as' => 'admin.corrales.destroy'
        ]);
        Route::get('corrales/{id}/animalcorral', [
            'uses' => 'CorralesController@animalcorral',
            'as' => 'admin.corrales.animalcorral'
        ]);
        //rutas animales
        Route::resource ('animales','AnimalesController');
        Route::get('animales/{id}/edit', [
            'uses' => 'AnimalesController@edit',
            'as' => 'admin.animales.edit'
        ]);
        Route::get('animales/{id}/destroy', [
            'uses' => 'AnimalesController@destroy',
            'as' => 'admin.animales.destroy'
        ]);
        Route::get('animales/{id}/perfil', [
            'uses' => 'AnimalesController@perfil',
            'as' => 'admin.animales.perfil'
        ]);
        Route::get('animales/{id}/pesoperfil', [
            'uses' => 'AnimalesController@pesoperfil',
            'as' => 'admin.animales.pesoperfil'
        ]);
        Route::get('animales/{id}/historialperfil', [
            'uses' => 'AnimalesController@historialperfil',
            'as' => 'admin.animales.historialperfil'
        ]);
        //rutas materiales
        Route::resource('materiales','MaterialesController');
        Route::get('materiales/{id}/destroy', [
            'uses' => 'MaterialesController@destroy',
            'as' => 'admin.materiales.destroy'
        ]);
        //rutas precios
        Route::resource('precios','PreciosController');
        Route::get('precios/{id}/destroy', [
            'uses' => 'PreciosController@destroy',
            'as' => 'admin.precios.destroy'
        ]);
        //rutas historiales
        Route::resource('historiales','HistorialesMedicosController');
        Route::get('historiales/{id}/destroy', [
            'uses' => 'HistorialesMedicosController@destroy',
            'as' => 'admin.historiales.destroy'
        ]);
        //rutas pesos
        Route::resource('pesos','PesosController');
        Route::get('pesos/{id}/destroy', [
            'uses' => 'PesosController@destroy',
            'as' => 'admin.pesos.destroy'
        ]);
        //rutas atributos
        Route::resource('atributos','AtributosController');
        Route::get('atributoss/{id}/destroy', [
            'uses' => 'AtributosController@destroy',
            'as' => 'admin.atributos.destroy'
        ]);



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
