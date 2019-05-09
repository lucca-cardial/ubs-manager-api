<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 01:03
 */

//Route::resource('ubs','UBSController');
Route::prefix('ubs')->group(function() {
    Route::post('/', 'UBSController@store');
    Route::get('/city/{city_code}', 'UBSController@index');
    Route::get('/{id}', 'UBSController@show');
});

Route::resource('specialities','SpecialityController');

Route::prefix('doctors')->group(function(){
    Route::post('/', 'DoctorController@store');
    Route::get('/ubs/{ubs_id}', 'DoctorController@index');
    Route::get('/{id}', 'DoctorController@show');
});