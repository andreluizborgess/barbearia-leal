<?php

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

Route::post('servico', [ServicoController::class, "Servico"]);

route::post('cliente',[ClienteController::class,'clienteCreate']);

route::post('find/cliente',[ClienteController::class, 'procurarPorNome']);

route::post('cliente/all',[ClienteController::class, 'exibirTodosClientes']);

route::post('editar/cliente',[ClienteController::class, 'editarCliente']);

Route::delete('cliente/excluir/{id}',[ClienteController::class, 'excluirCliente']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCpf']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCelular']);

route::post('find/cliente',[ClienteController::class, 'procurarPorEmail']);

route::post('recuperar/senha',[ClienteController::class, 'recuperarSenha']);

