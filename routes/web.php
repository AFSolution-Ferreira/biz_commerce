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
//    return view('welcome');
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
    /*
 * Rotas para Marks(MONTADORAS)
 * */
//    Route::resource('marks', 'AutoMakerController');
    Route::get('fornecedoras', ['as' => 'mark.index', 'uses' => 'AutoMakerController@index']);
    Route::get('fornecedora/cadastrar', ['as' => 'mark.create', 'uses' => 'AutoMakerController@create']);
    Route::post('fornecedora/salvar', ['as' => 'mark.save', 'uses' => 'AutoMakerController@store']);
    Route::get('fornecedora/editar/{id}', ['as' => 'mark.edit', 'uses' => 'AutoMakerController@edit']);
    Route::put('fornecedora/alterar/{id}', ['as' => 'mark.update', 'uses' => 'AutoMakerController@update']);
    Route::get('fornecedora/excluir/{id}', ['as' => 'mark.delete', 'uses' => 'AutoMakerController@destroy']);

    /*
     * Rotas para Cars(CARROS)
     * */
//    Route::resource('cars', 'AutoCarController');
    Route::get('carros', ['as' => 'car.index', 'uses' => 'AutoCarController@index']);
    Route::get('carro/cadastrar', ['as' => 'car.create', 'uses' => 'AutoCarController@create']);
    Route::post('carro/salvar', ['as' => 'car.save', 'uses' => 'AutoCarController@store']);
    Route::get('carro/editar/{id}', ['as' => 'car.edit', 'uses' => 'AutoCarController@edit']);
    Route::put('carro/alterar/{id}', ['as' => 'car.update', 'uses' => 'AutoCarController@update']);
    Route::get('carro/excluir/{id}', ['as' => 'car.delete', 'uses' => 'AutoCarController@destroy']);
});


