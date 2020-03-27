<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::resource('usuarios', 'UserController');

Route::resource('alumno', 'Alumnos');

Route::resource('clase', 'Clases');

Route::resource('carrera', 'Carreras');

Route::resource('periodo', 'Periodos');

Route::resource('historial', 'Historiales');

Route::post('importAlumnos-list-excel', 'Alumnos@importExcel')->name('alumnos.import.excel');
Route::post('importClases-list-excel', 'Clases@importExcel')->name('clases.import.excel');

Route::post('importCarreras-list-excel', 'Carreras@importExcel')->name('carreras.import.excel');

Route::get('alumnos-list.pdf', 'Alumnos@exportPdf')->name('alumnos.pdf');
Route::get('historiales-list.pdf', 'Historiales@exportPdf')->name('historiales.pdf');

Route::get('/report/alumno', 'Reports@indexa');
Route::get('/report/periodo', 'Reports@indexp');
