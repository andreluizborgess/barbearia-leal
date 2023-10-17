<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
            'profissionais_id' => 'required|',
            'cliente_id' => 'required|',
            'servico_id' => 'required|',
            'data_hora' => 'required|',
            'tipo_pagamento' => 'required|max:20|min:3',
            'valor' => 'required|',


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
            'profissionais_id.required' => 'o campo nome é obrigatório',


            'cliente_id.required' => 'o campo celular é obrigatório',

            'servico_id.required' => 'campo obrigatorio',
            'data_hora.required' => 'campo obrigatorio',
            'tipo_pagamento.required' => 'campo obrigatorio',
            'tipo_pagamento.max' => 'o campo deve conter no maximo 20 caracteres',
            'tipo_pagamento.min' => 'o campo deve conter no mínimo 3 caracteres',
            'valor.required' => 'campo obrigatorio',

        ];
    }
}
