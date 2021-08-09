<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group([ 

    'prefix' => 'auth',

], function ($router) {
    
    //Route::get('dangnhap', 'AuthController@getAuthLogin');
    
    /* Route::get('dangnhap', function () {
        if(session()->has('user')){
            return redirect('/api/authLogin');
        }
        return view('form');
    });  */
    /* Route::get('logout', function () {
        if(session()->has('user')){
            session()->pull('user');
        }
        return view('form');
    });  */
    Route::get('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
    
    Route::get('authLogin', 'AuthController@login');
    Route::post('authLogin', 'AuthController@login');
    
});

Route::group([

    'middleware' => ['web'],
    

], function ($router) {
    
    Route::get('userLogin', 'AuthController@getLoginUser');
    Route::get('user/{id}', 'AuthController@showData');
    Route::get('changePass', 'AuthController@changePass');
    Route::get('getListUser', 'AuthController@getUser');
    //Route::get('editlevel/{id}', 'AuthController@showDataLevel');
    Route::post('saveUpdatePass', 'AuthController@saveUpdatePass');
    Route::post('edituser', 'AuthController@updateUser');
    //Route::post('editlevel/{id}', 'AuthController@updateLevel');
    
});
