<?php

Route::get('/', function () {
    return view('welcome');
});


// PERSONA
Route::get('traer1', ['uses' => 'PersonaController@consultaPersonas1']);
Route::get('traer2', ['uses' => 'PersonaController@consultaPersonas2']);

Route::get('insertar/{nombre}/{edad}', ['uses' => 'PersonaController@insertar']);

Route::get('actualizarNombre/{id}/{nombre}', ['uses' => 'PersonaController@updateNombre']);
Route::get('actualizarEdad/{id}/{edad}', ['uses' => 'PersonaController@updateEdad']);
Route::get('update/{id}/{nombre}/{edad}', ['uses' => 'PersonaController@update']);
Route::get('eliminar/{id}', ['uses' => 'PersonaController@eliminar']);

