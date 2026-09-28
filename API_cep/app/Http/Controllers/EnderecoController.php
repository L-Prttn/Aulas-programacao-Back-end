<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    // GET /api/enderecos
    public function index()
    {
        return response()->json(Endereco::all());
    }

    // GET /api/enderecos/{cep}
    public function show(string $cep)
    {
        // Remove qualquer caractere que não seja número (aceita "01001-000")
        $cep = preg_replace('/\D/', '', $cep);

        if (strlen($cep) !== 8) {
            return response()->json([
                'mensagem' => 'CEP inválido. Informe 8 dígitos.'
            ], 400);
        }

        // Formato que o ViaCEP devolve e que fica salvo no banco: 01001-000
        $cepFormatado = substr($cep, 0, 5) . '-' . substr($cep, 5);

        // 1. Já existe no banco? Então não chama o ViaCEP
        $endereco = Endereco::where('cep', $cepFormatado)->first();

        if ($endereco) {
            $endereco->increment('consultas');
            return response()->json($endereco);
        }

        // 2. Não existe: consulta a API externa
        $resposta = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($resposta->failed()) {
            return response()->json([
                'mensagem' => 'Não foi possível consultar o ViaCEP.'
            ], 502);
        }

        $dados = $resposta->json();

        // 3. CEP inexistente: o ViaCEP responde {"erro": true}
        if (isset($dados['erro'])) {
            return response()->json([
                'mensagem' => 'CEP não encontrado.'
            ], 404);
        }

        // 4. Salva no banco e devolve
        $endereco = Endereco::updateOrCreate(
            ['cep' => $dados['cep']],
            [
                'logradouro' => $dados['logradouro'],
                'bairro'     => $dados['bairro'],
                'localidade' => $dados['localidade'],
                'uf'         => $dados['uf'],
            ]
        );

        return response()->json($endereco->refresh(), 201);
    }
}