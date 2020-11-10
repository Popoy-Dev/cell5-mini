<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// register vicinity
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@registerUpload');
// view
Route::get('/view', 'RegisterController@viewRegister');
// edit
Route::get('/edit', 'RegisterController@editRegister');
Route::put('/register-edit/{id}', 'RegisterController@editableRegister');
// delete
Route::get('/delete', 'RegisterController@deleteRegister');
Route::get('/register-hide/{id}', 'RegisterController@hideRegister');
Route::get('/register-unhide/{id}', 'RegisterController@unhideRegister');

// search register

Route::get('/register-search/{value}', 'RegisterController@searchRegister');

Route::group(['prefix' => 'superadmin'], function () {
  Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm');
  Route::post('/login', 'SuperadminAuth\LoginController@login');
  Route::post('/logout', 'SuperadminAuth\LoginController@logout');

  Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'SuperadminAuth\RegisterController@register');

  Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'superadmin', 'middleware' => ['superadmin']], function() {
// add barangay
  Route::get('/band-add', 'BandController@index');
  Route::post('/band-add', 'BandController@bandAdd');
  // view only registered barangay

  Route::get('/band-view', 'BandController@viewBand');
  // edit barangay
  Route::get('/band-edit', 'BandController@editBand');
  Route::put('/band-edit/{id}', 'BandController@editableBand');

  // delete barangay soft delete
  Route::get('/band-delete', 'BandController@deleteBand');
  Route::get('/band-hide/{id}', 'BandController@hideBand');
  Route::get('/band-unhide/{id}', 'BandController@unhideBand');

});

Route::group(['prefix' => 'viewer'], function () {
  Route::get('/login', 'ViewerAuth\LoginController@showLoginForm');
  Route::post('/login', 'ViewerAuth\LoginController@login');
  Route::post('/logout', 'ViewerAuth\LoginController@logout');

  Route::get('/register', 'ViewerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'ViewerAuth\RegisterController@register');

  Route::post('/password/email', 'ViewerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'ViewerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'ViewerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'ViewerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'viewer', 'middleware' => ['viewer']], function() {
  Route::get('/view-list', 'ViewerController@index');
  Route::get('/view-bands', 'ViewerController@viewBands');
  Route::get('view-songs/{code}', 'ViewerController@songBands');
  Route::get('/view-genres', 'ViewerController@viewGenre');
  Route::get('genre-songs/{genre}', 'ViewerController@genreList');
  Route::get('/song-search/{value}', 'ViewerController@searchSong');



});
