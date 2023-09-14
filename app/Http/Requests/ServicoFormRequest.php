<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:90|min:5',
            'descrição' => 'required|max:200|min:10',
            'duração' => 'required|integer',
            'preco' => 'required|decimal:2'
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
            'nome.max' => 'o campo deve conter no maximo 80 caracteres',
            'nome.min' => "o campo deve conter no minimo 5 caracteres",
            'descricao.required' => 'o campo descricao é obrigatório',
            'descricao.max' => 'o campo deve conter no maximo 200 caracteres',
            'descricao.min' => 'o campo deve conter no minimo 10 caracteres',
            'preco.required' => 'campo obrigatorio',
            'preco.decimal' => 'o formato de preço é invalido'

        ];
    }
}
