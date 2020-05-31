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

//Redireccionamiento
Route::get('/', function () {
    return view('VistaPrincipal');
});
Route::get('/subir', function(){
    return view('subirHistorico');
});
Route::get('/verHistorico', function(){
   return view('Historico');
});
Route::get('/verPrediccion', function(){
    return view('Prediccion');
});

//POST y GET de río
Route::post('Detalles', 'RioController@verDetalles')->name('verDetalles');
Route::post('VerPrediccion', 'RioController@verPrediccion')->name('verPrediccion');
Route::get('CompletarDatos', 'RioController@completarDatosHistorico')->name('completarDatos');
Route::get('EliminarRepetidos', 'RioController@eliminarRepetidosHistorico')->name('eliminarRepetidos');
Route::post('GetFechas', 'RioController@getFechas');
Route::post('GetEstado', 'RioController@getEstado')->name('verEstado');
Route::get('GetSeccion', 'RioController@getSeccion')->name('getSeccion');

//POST y GET de Excel
Route::post('import-list-excel1', 'ExcelController@importExcelQuimicos')->name('import.quimicosRio');
Route::post('import-list-excel2', 'ExcelController@importExcelInfo')->name('import.infoRio');
Route::get('tabla_quimicos_rios/export/', 'ExcelController@exportarHistorico')->name('exportarHistorico');
Route::get('tabla_prediccion_rio/export/', 'ExcelController@exportarPredicciones')->name('exportarPredicciones');