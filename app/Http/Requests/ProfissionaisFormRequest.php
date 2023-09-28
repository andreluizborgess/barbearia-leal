<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionaisFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|max:11|min:10',
            'email' => 'required|max:120',
            'cpf' => 'required|max:11|min:11',
            'dataDeNascimento' => 'required',
            'cidade' => 'required|max:120',
            'estado' => "required|max:2|min:2",
            'pais' => 'required|max:80',
            'rua' => 'required|max:120',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:100',
            'cep' => 'required|max:8',
            'complemento' => 'required|max:150',
            'senha' => 'required|',
            'salario' => 'required|decimal:2'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'o campo nome é obrigatório',
            'nome.max' => 'o campo deve conter no maximo 120 caracteres',
            'nome.min' => "o campo deve conter no minimo 5 caracteres",
            'celular' => 'o campo celular é obrigatório',
            'descricao.max' => 'o campo deve conter no maximo 11 caracteres',
            'descricao.min' => 'o campo deve conter no minimo 10 caracteres',
            'email.required' => 'campo obrigatorio',
            'email.max' => 'o campo deve conter no maximo 120 caracteres',
            'cpf.required' => 'campo obrigatorio',
            'cpf.max' => 'o campo deve conter no maximo 11 caracteres',
            'cpf.min' => 'o campo deve conter no mínimo 11 caracteres',
            'cidade.required' => 'campo obrigatorio',
            'cidade.max' => 'o campo deve conter no máximo 120 caracteres',
            'estado.required' => 'campo obrigatorio',
            'estado.max'=> 'o campo deve conter no maximo 2 caracteres',
            'estado.min'=> 'o campo deve conter no minimo 2 caracteres',
            'pais.required'=> 'campo obrigatorio',
            'pais.max'=> 'o campo deve conter no maximo 80 caracteres',
            'rua.required'=> 'campo obrigatorio',
            'rua.max'=> 'o campo deve conter no maximo 120 caracteres ',
            'numero.required'=> 'campo obrigatorio',
            'numero.max'=> 'o campo deve conter no maximo 10 caracteres',
            'bairro.required'=> ' campo obrigatorio',
            'bairro.max'=> ' o campo deve conter no maximo 100 caracteres',
            'cep.required'=> 'campo obrigatorio',
            'cep.max'=> ' o campo deve conter no maximo 8 caracteres',
            'cep.min'=> ' o campo deve conter no minimo8 caracteres',
            'complemento.required'=> 'nao obrigatorio',
            'senha.required'=> 'campo obrigatorio',
            'salario.required' => 'campo obrigatorio'








        ];
    }
       
        }

