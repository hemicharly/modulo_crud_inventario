<?php

Route::get('/', function () {
    return view('index');
});

Route::get('inventario', 'ControladorInventario@index');
Route::get('inventario/novo', 'ControladorInventario@create')->name('inventario.novo');
Route::post('inventario', 'ControladorInventario@store');
Route::post('inventario/{id}', 'ControladorInventario@update');
Route::get('inventario/editar/{id}', 'ControladorInventario@edit');
Route::get('inventario/apagar/{id}', 'ControladorInventario@destroy');
Route::any('inventario.search', 'ControladorInventario@search')->name('inventario.search');

Route::get('boleto', 'ControladorBoleto@index');
Route::post('boleto', 'ControladorBoleto@store');