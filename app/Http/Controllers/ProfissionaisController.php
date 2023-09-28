<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionaisFormRequest;
use App\Models\Profissionai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionaisController extends Controller
{
    public function cadastroProfissionais(ProfissionaisFormRequest $request)
    {
        $profissionais = Profissionai::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataDeNascimento' => $request->dataDeNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'senha' => Hash::make($request->senha),
            'salario'=> $request->salario
        ]);
        return response()->json([
            "success"=>true,
            "message"=>"Profissional cadastrado com sucesso",
            "data"=>$profissionais
        ],200);
    }
    public function pesquisaPorNome(Request $request){
        $profissionais = Profissionai::where('nome', 'like', '%' . $request->nome)->get();
        if (count($profissionais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionais
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisar'
        ]);
    }
    public function exibirTodos()
    {
        $profissionais = Profissionai::all();
        return response()->json([
            'status' => true,
            'data' => $profissionais
        ]);
    }

        public function editarProfissional(Request $request)
    {
        $profissionais = Profissionai::find($request->id);

        if (!isset($profissionais)) {
            return response()->json([
                'status' => false,
                'massage' => "profissional não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $profissionais->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $profissionais->celular = $request->celular;
        }
        if (isset($request->email)) {
            $profissionais->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissionais->cpf = $request->cpf;
        }
        if (isset($request->dataNacimento)) {
            $profissionais->dataNacimento = $request->dataNacimento;
        }
        if (isset($request->cidade)) {
            $profissionais->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $profissionais->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $profissionais->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissionais->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissionais->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissionais->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissionais->cep = $request->cep;
        }
        if (isset($request->complemeto)) {
            $profissionais->complemeto = $request->complemeto;
        }
        if (isset($request->password)) {
            $profissionais->password = $request->password;
        }
        if (isset($request->salario)) {
            $profissionais->salario = $request->salario;
        }

        $profissionais->update();
        return response()->json([
            'status' => true,
            'message' => "profissional atualizado"
        ]);
    }
        public function excluir($id)
    {
        $profissionais= Profissionai::find($id);

        if (!isset($rofissionais)) {
            return response()->json([
                'status' => false,
                'massage' => "profissional não encontrado"
            ]);
        }
        $profissionais->delete();

        return response()->json([
            'status' => true,
            'message' => "profissional excluido com sucesso"
        ]);
    }

        public function pesquisarPorNome(Request $request)
    {
        $profissionais = Profissionai::where('nome', 'like', '%' . $request->nome)->get();
        if (count($profissionais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionais
            ]);
        }
   
}
public function procurarPorCpf(Request $request)
    {

        $profissionais = Profissionai::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($profissionais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionais
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }

    public function procurarPorCelular(Request $request)
    {

        $profissionais = Profissionai::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($profissionais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionais
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }

    public function procurarPorEmail(Request $request)
    {

        $profissionais = Profissionai::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($profissionais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionais
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
}
