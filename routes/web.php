<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|Aqui estão listadas todas as rotas do sistema
|
*/
/*Rota inicial, que lista todos os projetos*/
Route::get('/', function () {
    $projetos = \App\Models\Projeto::all();
    return view('welcome')->with(["projetos"=>$projetos]);
})->name('welcome');

/*Rota da CRUD de atividade*/
Route::resource("/atividade","App\Http\Controllers\atividadeController",['except'=>'destroy']);
Route::delete('/atividade/remover/{id}', "App\Http\Controllers\atividadeController@destroy")->name('atividade.remover');

/*Rota da CRUD de projeto*/
Route::resource("/projeto","App\Http\Controllers\projetoController",['except'=>'destroy']);
Route::delete('/projeto/remover/{id}', "App\Http\Controllers\projetoController@destroy")->name('projeto.remover');

/*Essa rota encaminha para a tela de seleção de projeto para adicionar nova atividade*/
Route::get("/selecionarProjeto","App\Http\Controllers\atividadeController@selecionarProjeto")->name("selecionarProjeto");


/*Rota de cadastro de atividade*/
Route::get("/cadastrarAtividade","App\Http\Controllers\atividadeController@cadastrar")->name("cadastrarAtividade");

/*Rota que lista todas as atividades de um deteminado projeto*/
Route::get("/listarAtividades","App\Http\Controllers\atividadeController@listar")->name("listarAtividades");

/*Essa rota é acionada quando o botão 'concluir atividade' é clicado*/
Route::get("/concluida","App\Http\Controllers\atividadeController@concluida")->name("concluida");
