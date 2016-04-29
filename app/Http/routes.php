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
    Route::group(['prefix' => 'admin'], function () {

        Route::resource('users','UsersController');
        Route::get('users/{id}/destroy', [
            'uses' => 'UsersController@destroy',
            'as' => 'admin.users.destroy'
        ]);
        Route::get('users/{id}/edit', [
            'uses' => 'UsersController@edit',
            'as' => 'admin.users.edit'
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


        Route::resource ('animales','AnimalesController');
    });
});
Route::get('admin/auth/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as'   => 'admin.auth.login'
]);


Route::post('admin/auth/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as'   => 'admin.auth.loguin'
]);
Route::get('admin/auth/logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as'   => 'admin.auth.login'
]);



Route::get('home', function () {
    return view('home');
});


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
