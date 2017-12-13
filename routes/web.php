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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ------------------------------------------------------------------------------
// DOGS

Route::get( 'caes','DogController@index' )->name( 'caes' )->middleware( 'auth' );
Route::get('editar-cao/{dog}','DogController@edit')->name( 'editar-cao' )->middleware( 'auth' );
Route::get('adicionar-cao','DogController@create')->name( 'adicionar-cao' )->middleware( 'auth' );

Route::post('adicionar-cao/','DogController@store')->name( 'adicionar-cao' )->middleware( 'auth' );

Route::put('editar-cao/{dog}','DogController@update')->name( 'editar-cao' )->middleware( 'auth' );
Route::delete('deletar-cao/{dog}','DogController@destroy')->name( 'deletar-cao' )->middleware( 'auth' );

// ------------------------------------------------------------------------------