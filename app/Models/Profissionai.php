<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissionai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'celular',
        'email',
        'cpf',
        'dataDeNascimento',
        'cidade',
        'estado',
        'pais',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'cep',
        'complemento',
        'senha',
        'salario'


    ];
}
