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

Route::get('/manter/produtos', 'ManterController@manterProdutos');

Route::get('/manter/categorias', 'ManterController@manterCategorias');

Route::get('/manter/marcas', 'ManterController@manterMarcas');

Route::get('/manter/permissoes', 'ManterController@manterPermissoes');

Route::get('/manter/permissoes/{role}', 'ManterController@showPermissao');

Route::get('/manter/permissao-create', 'ManterController@createPermissao');

Route::get('/manter/permissao-delete/{role}', 'ManterController@deletePermissao');

Route::post('/manter/permissoes/', 'ManterController@storePermissao');

Route::get('/manter/usuarios', 'ManterController@manterUsuarios');

Route::get('/manter/usuarios/{user}', 'ManterController@showUsuario');

Route::get('/manter/usuario-create', 'ManterController@createUsuario');

Route::get('/manter/usuario-delete/{user}', 'ManterController@deleteUsuario');

Route::post('/manter/usuarios/', 'ManterController@storeUsuario');
