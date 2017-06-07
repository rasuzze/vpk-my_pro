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

Route::get('/', function () {
    return redirect('paskelbtik');
});

Auth::routes();
Route::resource('paskelbtik', 'PaskelbtasKonkursasController');
Route::resource('paskelbtits', 'PaskelbtasKonkursoTsController');
Route::resource('suvestine', 'KonkursuSuvestineController');
Route::resource('po', 'PerkanciojiOrganizacijaController');
Route::delete('/file/{id}', 'FileUploadController@delete');
Route::resource('sutartys', 'SutartysController');
Route::get('/kalendorius', 'KalendoriusController@index')->name('kalendorius');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// Route::post('/paskelbtik/create/data', 'PaskelbtasKonkursasController@getDataFromSesion')->name('getdata');


