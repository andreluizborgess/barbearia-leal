<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServicoController extends Controller
{
    public function Servico(ServicoFormRequest $request)
    {
        $servicos = Servico::create([
            'nome' => $request->nome,
            'descrição' => $request->descrição,
            'duração' => $request->duração,
            'preco' => $request->preco,
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "servico cadastrado com sucesso",
            "data"    => $servicos
        ], 200);
    }
    public function pesquisaPorNome()
    {
        $usuarios = Servico::where('nome', 'like', '%')->get();
        if (count($usuarios) > 0) {
            return response()->json([
                'status' => true,
                'data' => $usuarios
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisar'
        ]);
    }
    public function exibirServico(){
        $usuario = Servico::all();
        return response()->json([
'status'=> true,
'data'=>$usuario
        ]);
    }

        public function editar(Request $request){
        $usuario = Servico::find($request->id);

        if(!isset($usuario)){
            return response()->json([
                'status'=> false,
                'message'=>"serviço nao encontrado"
            ]);
        }
        
        if(isset($request->nome)){
            $usuario->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $usuario->descricao = $request->descricao;
        }
        if(isset($request->duracao)){
            $usuario->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $usuario->preco = $request->preco;
        }
        $usuario->update();
        return response()->json([
            'status'=>false,
            'message'=>"serviço atualizado"
        ]);
}
public function excluir($id){
    $usuario = Servico::find($id);
    if(!isset($usuario)){
        return response()->json([
            'status'=>false,
            'message'=>"serviço nao encontrado"
        ]);
    }
    $usuario->delete();
    return response()->json([
        'status'=>true,
        'message'=>"servico excluido"
    ]);
}
}

 