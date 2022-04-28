<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ImovelController;

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

//PARTE ADMINISTRATIVA
Route::prefix('admin')->name('admin.')->group(function(){
    //Utilizando um Controller Resource
    Route::resource('cidades', CidadeController::class)->except(['show']);
    Route::resource('imoveis', ImovelController::class);

    //nested resource : /imoveis/id/fotos/???
    Route::resource('imoveis.fotos', FotoController::class)->except(['show','edit','update']);


 // Utilizando um Controller manual
    /*
    Route::get('/cidades', [CidadeController::class, 'cidades'])->name('cidades.listar');
    Route::get('/cidades/salvar',[CidadeController::class, 'formAdicionar'])->name('cidades.form');
    Route::post('/cidades/salvar',[CidadeController::class, 'adicionar'])->name('cidades.adicionar');
    Route::delete('/cidades/{id}',[CidadeController::class, 'deletar'])->name('cidades.deletar');
    Route::get('/cidades/{id}', [CidadeController::class, 'formEditar'])->name('cidades.formEditar');
    Route::put('/cidades/{id}', [CidadeController::class, 'editar'])->name('cidades.editar');
    */

});


//SITE PRINCIPAL

Route::resource('/', App\Http\Controllers\Site\CidadeController::class)->only('index');

Route::resource('cidades.imoveis', App\Http\Controllers\Site\ImovelController::class)->only(['index', 'show']);
