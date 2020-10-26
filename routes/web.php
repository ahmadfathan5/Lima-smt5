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

// Route::group(['before' => 'auth'], function ()
// {
//
// });

// Route::get('/admin', function(){
//     return view('admin');
// })->name('adminpage');
// Route::get('/admin-login','Auth\AdminLoginController@showLoginForm');
// Route::post('/admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
// Route::get('/admin-register','Auth\AdminLoginController@showRegisterPage');
// Route::post('/admin-register', 'Auth\AdminLoginController@register')->name('admin.register');
// Route::get('/admin-logout', '\Auth\AdminLoginController@logout');

Auth::routes();

Route::get('/user', function(){return view('user');})->name('userpage');
Route::get('/login','Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/register','Auth\LoginController@showRegisterPage');
Route::post('/register', 'Auth\LoginController@register')->name('register');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user/{id}','UserController@select');
Route::get('/profiluser/{id}','UserController@profil')->name('userprofil');

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');

Route::get('/cari','CariController@cariPage')->name('carinama');
Route::get('/cari/{id}/{id2}','CariController@cari');

Route::get('/daftar/{id}/{id2}','DaftarController@index')->name('daftarindex');
Route::get('/prodi','DaftarController@prodi')->name('prodi');
Route::get('/tim/{id}','DaftarController@tim')->name('timp');
Route::get('/tim_member/{id}','DaftarController@tim_member')->name('tim_member');
Route::get('/sprint/{id}/{id2}/{id3}','DaftarController@sprint')->name('sprint');
Route::get('/semester/{id}','DaftarController@semester')->name('semester');

Route::get('/pointmember','PointMemberController@index')->name('pointmember');
Route::get('/pointmember','PointMemberController@createPage');
Route::post('/pointmember', 'PointMemberController@create')->name('createpointmember');
Route::get('/pointmember/{id}/{id2}/{id3}/{id4}/{id5}','PointMemberController@updatePage');
Route::post('/pointmember/{id}/{id2}/{id3}/{id4}/{id5}', 'PointMemberController@update')->name('updatepointmember');

// Route::get('/point_member/create','PointMemberController@create')->name('createpointmember');
// Route::get('/point_member/update','PointMemberController@update')->name('updatepointmember');
