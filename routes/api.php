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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', function(){return view('user');})->name('userpage');
Route::get('/login','AuthAPI\LoginAPIController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'AuthAPI\LoginAPIController@login']);
Route::get('/register','AuthAPI\LoginAPIController@showRegisterPage');
Route::post('/register', 'AuthAPI\LoginAPIController@register')->name('register');
Route::get('/logout', 'AuthAPI\LoginAPIController@logout');

Route::get('apiprodi','ProdiAPIController@index');
Route::get('apiprodi/{id}','ProdiAPIController@select');
Route::post('apiprodi','ProdiAPIController@create');
Route::put('apiprodi/{id}','ProdiAPIController@update');
Route::delete('apiprodi/{id}','ProdiAPIController@delete');

Route::get('apitim','TimAPIController@index');
Route::get('apitim/{id}','TimAPIController@select');
Route::post('apitim','TimAPIController@create');
Route::put('apitim/{id}','TimAPIController@update');
Route::delete('apitim/{id}','TimAPIController@delete');

Route::get('apisprint','SprintAPIController@index');
Route::get('apisprint/{id}','SprintAPIController@select');
Route::post('apisprint','SprintAPIController@create');
Route::put('apisprint/{id}','SprintAPIController@update');
Route::delete('apisprint/{id}','SprintAPIController@delete');

Route::get('apiuser','UserAPIController@index');
Route::get('apiuser/{id}','UserAPIController@select');
Route::post('apiuser','UserAPIController@create');
Route::put('apiuser/{id}','UserAPIController@update');
Route::delete('apiuser/{id}','UserAPIController@delete');
Route::get('apiuser/cari/{nama}/{role}','UserAPIController@cari');

Route::get('apipointmember','PointMemberAPIController@index');
Route::get('apipointmember/{id}','PointMemberAPIController@select');
Route::post('apipointmember','PointMemberAPIController@create');
Route::get('apipointmember/updatePage/{id}/{id2}/{id3}/{id4}/{id5}','PointMemberAPIController@updatePage');
Route::post('apipointmember/{id}/{id2}/{id3}/{id4}/{id5}','PointMemberAPIController@update');
Route::post('apipointmembermobile/{id}/{id2}','PointMemberAPIController@updatemobile');
Route::delete('apipointmember/{id}','PointMemberAPIController@delete');

Route::get('apinilaifinalmember','NilaiFinalMemberAPIController@index');
Route::get('apinilaifinalmember/{id}','NilaiFinalMemberAPIController@select');
Route::post('apinilaifinalmember','NilaiFinalMemberAPIController@create');
Route::put('apinilaifinalmember/{id}','NilaiFinalMemberAPIController@update');
Route::delete('apinilaifinalmember/{id}','NilaiFinalMemberAPIController@delete');

Route::get('apidaftar/{id}/{id2}','DaftarAPIController@index');
Route::get('apidaftarsprint/{id}/{id2}/{id3}','DaftarAPIController@sprint');
Route::get('apidaftarsemester/{id}','DaftarAPIController@semester');
