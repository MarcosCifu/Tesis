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
    });
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


        Route::resource('users','UsersController');
        Route::get('users/{id}/destroy', [
            'uses' => 'UsersController@destroy',
            'as' => 'admin.users.destroy'
        ]);
        Route::get('users/{id}/edit', [
            'uses' => 'UsersController@edit',
            'as' => 'admin.users.edit'
        ]);
        Route::get('galpones/{id}/perfil', [
            'uses' => 'GalponesController@perfil',
            'as' => 'admin.galpones.perfil'
        ]);
        Route::resource ('galpones','GalponesController');
        Route::get('galpones/{id}/destroy', [
            'uses' => 'GalponesController@destroy',
            'as' => 'admin.galpones.destroy'
        ]);
        Route::get('galpones/{id}/edit', [
            'uses' => 'GalponesController@edit',
            'as' => 'admin.galpones.edit'
        ]);

        Route::resource ('corrales','CorralesController');
        Route::get('corrales/{id}/destroy', [
            'uses' => 'CorralesController@destroy',
            'as' => 'admin.corrales.destroy'
        ]);
        Route::get('corrales/{id}/edit', [
            'uses' => 'CorralesController@edit',
            'as' => 'admin.corrales.edit'
        ]);


        Route::resource ('animales','AnimalesController');
        Route::get('/admin/animales/create/ajax-corral',function(){
            $id_galpon = Input::get('id_galpon');
            $corrales = Corral::where('id_galpon',$id_galpon)->get();
            return $corrales;
        });
        Route::get('animales/{id}/destroy', [
            'uses' => 'AnimalesController@destroy',
            'as' => 'admin.animales.destroy'
        ]);
        Route::get('animales/{id}/edit', [
            'uses' => 'AnimalesController@edit',
            'as' => 'admin.animales.edit'
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

        Route::resource('materiales','MaterialesController');
        Route::get('materiales/{id}/destroy', [
            'uses' => 'MaterialesController@destroy',
            'as' => 'admin.materiales.destroy'
        ]);
        Route::get('materiales/{id}/edit', [
            'uses' => 'MaterialesController@edit',
            'as' => 'admin.materiales.edit'
        ]);

        Route::resource('historiales','HistorialesMedicosController');
        Route::get('historiales/{id}/destroy', [
            'uses' => 'HistorialesMedicosController@destroy',
            'as' => 'admin.historiales.destroy'
        ]);
        Route::get('historiales/{id}/edit', [
            'uses' => 'HistorialesMedicosController@edit',
            'as' => 'admin.historiales.edit'
        ]);

        Route::resource('pesos','PesosController');
        Route::get('pesos/{id}/destroy', [
            'uses' => 'PesosController@destroy',
            'as' => 'admin.pesos.destroy'
        ]);
        Route::get('pesos/{id}/edit', [
            'uses' => 'PesosController@edit',
            'as' => 'admin.pesos.edit'
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
