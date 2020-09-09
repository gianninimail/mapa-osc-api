<?php

namespace App\Http\Controllers;

use App\Models\Osc\RelacoesTrabalho;
use App\Services\Osc\RelacoesTrabalhoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RelacoesTrabalhoController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param RelacoesTrabalhoService $service
     */
    public function __construct(RelacoesTrabalhoService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            $relacaoTrabalho = $this->service->get($id);
            if (is_null($relacaoTrabalho))
            {
                return response()->json(['Resposta' => 'Relação de Trabalho não encontrada!'], Response::HTTP_OK);
            }

            return $relacaoTrabalho;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getRelacoesTrabalhoPorOSC($id_osc)
    {
        try {
            $relacoes = $this->service->getRelacoesTrabalhoPorOSC($id_osc);

            if (count($relacoes) == 0)
            {
                return response()->json(['Resposta' => 'Nenhuma Relação de Trabalho foi encontrada para essa OSC!'], Response::HTTP_OK);
            }

            return $relacoes;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request) {
        try {
            $dados = $request->all();

            //Retorna novo registro
            return response()->json($this->service->store($dados), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id_osc, Request $request) {
        try {
            $dados = $request->all();

            $relacaoTrabalho = $this->service->update($id_osc, $dados);

            if ($relacaoTrabalho)
            {
                return response()->json(['Resposta' => 'Relação de Trabalho atualizada com sucesso!'], Response::HTTP_OK);
            }

            return $relacaoTrabalho;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_relacaoTrabalho) {
        try {
            if ($this->service->delete($id_relacaoTrabalho))
            {
                return response()->json(['Resposta' => 'Relação de Trabalho deletada com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
