<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AgendaController extends Controller
{
    public function cadastro(AgendaFormRequest $request){
        $agenda = Agenda::create([
            'profissional_id',
            'cliente_id',
            'servico_id',
            'data_hora',
            'tipo_pagamento',
            'valor'
        ]);
    }
}
