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
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
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
        $servicos = Servico::where('nome', 'like', '%')->get();
        if (count($servicos) > 0) {
            return response()->json([
                'status' => true,
                'data' => $servicos
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisar'
        ]);
    }
    public function exibirServico(){
        $servicos = Servico::all();
        return response()->json([
'status'=> true,
'data'=>$servicos
        ]);
    }

        public function editar(Request $request){
        $servicos = Servico::find($request->id);

        if(!isset($servicos)){
            return response()->json([
                'status'=> false,
                'message'=>"serviço nao encontrado"
            ]);
        }
        
        if(isset($request->nome)){
            $servicos->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $servicos->descricao = $request->descricao;
        }
        if(isset($request->duracao)){
            $servicos->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $servicos->preco = $request->preco;
        }
        $servicos->update();
        return response()->json([
            'status'=>false,
            'message'=>"serviço atualizado"
        ]);
}
public function excluir($id){
    $servicos = Servico::find($id);
    if(!isset($servicos)){
        return response()->json([
            'status'=>false,
            'message'=>"serviço nao encontrado"
        ]);
    }
    $servicos->delete();
    return response()->json([
        'status'=>true,
        'message'=>"servico excluido"
    ]);
}
}

 