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
            'profissional_id'=>'required',
            'cliente_id'=>'required',
            'servico_id'=>'required',
            'data_hora'=>'required|dateTime',
            'pagamento'=>'required',
            'valor'=>'required|decimal:2'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){
        return [
            'profissional_id.required'=>'O campo profissional é obrigatorio',
            'cliente_id.required'=>'O campo cliente é obrigatorio',
            'servico_id.required'=>'O campo serviço é obrigatorio',
            'data_hora.required'=>"O campo data é obrigatorio",
            'data_hora.dateTime'=> 'O campo data esta no formato errado',
            'pagamento.required'=>'O campo forma de pagamento é obrigatorio',
            'valor.required'=>'O campo valor é obrigatorio',
            'valor.decimal'=>'O campo valor esta no formato errado'
        ];
    }
}