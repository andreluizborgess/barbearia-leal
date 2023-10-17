<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//serviço
Route::post('servico', [ServicoController::class, "Servico"]);

Route::post('editar', [ServicoController::class, "editar"]);

Route::post('find/serviço', [ServicoController::class, "pesquisaPorNome"]);

Route::post('serviço/all', [ServicoController::class, "exibirServico"]);

Route::delete('servico/excluir/{id}', [ServicoController::class, "excluir"]);

//clientes
route::post('cliente',[ClienteController::class,'cadastro']);

route::post('find/cliente',[ClienteController::class, 'procurarPorNome']);

route::post('cliente/all',[ClienteController::class, 'exibirTodos']);

route::post('editar/cliente',[ClienteController::class, 'editarCliente']);

Route::delete('cliente/excluir/{id}',[ClienteController::class, 'excluirCliente']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCpf']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCelular']);

route::post('find/cliente',[ClienteController::class, 'procurarPorEmail']);

route::post('recuperar/senha',[ClienteController::class, 'recuperarSenha']);

//profissionais
route::post('profissional',[ProfissionaisController::class, 'cadastroProfissionais']);

route::post('pesquisa/profissional',[ProfissionaisController::class, 'pesquisaPorNome']);

route::post('exibirProfissionais',[ProfissionaisController::class, 'exibirTodos']);

route::post('editarProfissionais',[ProfissionaisController::class, 'editarProfissional']);

route::delete('excluirProfissionais/{id}',[ProfissionaisController::class, 'excluir']);

route::post('pesquisarProfissionaisNome',[ProfissionaisController::class, 'pesquisarPorNome']);

//////////////////////////////// AGENDA PORRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA










