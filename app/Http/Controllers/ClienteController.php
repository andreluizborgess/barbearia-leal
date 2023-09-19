<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use COM;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastro(ClienteFormRequest $request){
        $cadastros = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'data de nascimento'=> $request->dataDeNascimento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            'pais'=>$request->pais,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,            
            'cep'=>$request->cep,
            'complemento'=>$request->complemento,
            'password'=>$request->password

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "cliente cadastrado com sucesso",
            "data"    => $cadastros
        ], 200);
    }
    public function pesquisaPorNome(Request $request){
        $cadastros = Cliente::where('nome', 'like', '%' . $request->nome)->get();
        if (count($cadastros) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cadastros
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisar'
        ]);
    }
    public function exibirTodos(){
        $clientes = Cliente::all();
        return response()->json([
'status' => true,
'data'=>$clientes
        ]); 
    }
    public function editarCliente(Request $request)
    {
        $clientes = Cliente::find($request->id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $clientes->nome = $request->nome;
        }
        if (isset($request->celular)){
            $clientes->celular = $request->celular;
        }
        if (isset($request->email)){
            $clientes->email = $request->email;
        }
        if (isset($request->cpf)){
            $clientes->cpf = $request->cpf;
        }
        if (isset($request->dataNacimento)){
            $clientes->dataNacimento = $request->dataNacimento;
        }
        if (isset($request->cidade)){
            $clientes->cidade = $request->cidade;
        }
        if (isset($request->estado)){
            $clientes->estado = $request->estado;
        }
        if (isset($request->pais)){
            $clientes->pais = $request->pais;
        }
        if (isset($request->rua)){
            $clientes->rua = $request->rua;
        }
        if (isset($request->numero)){
            $clientes->numero = $request->numero;
        }
        if (isset($request->bairro)){
            $clientes->bairro = $request->bairro;
        }
        if (isset($request->cep)){
            $clientes->cep = $request->cep;
        }
        if (isset($request->complemeto)){
            $clientes->complemeto = $request->complemeto;
        }
        if (isset($request->password)){
            $clientes->password = $request->password;
        }

        $clientes->update();
        return response()->json([
            'status' => true,
            'message' => "Cliente atualizado"
        ]);
    }
    public function excluirCliente($id)
    {
        $clientes = Cliente::find($id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        $clientes->delete();

        return response()->json([
            'status' => true,
            'message' => "Cliente excluido com sucesso"
        ]);
    }

}
