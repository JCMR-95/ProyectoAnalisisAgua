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
    return view('VistaPrincipal');
});

Route::post('import-list-excel1', 'ExcelController@importExcelQuimicos')->name('import.quimicosRio');
Route::post('import-list-excel2', 'ExcelController@importExcelInfo')->name('import.infoRio');
