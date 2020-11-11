<?php

namespace App\Http\Controllers;

use App\Services\Osc\ParticipacaoSocialConferenciaService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParticipacaoSocialConferenciaController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ParticipacaoSocialConferenciaService $service
     */
    public function __construct(ParticipacaoSocialConferenciaService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            $ps_conferencia = $this->service->get($id);
            if (is_null($ps_conferencia))
            {
                return response()->json(['Resposta' => 'Item Participação Social Conferência não encontrado!'], Response::HTTP_OK);
            }

            return $ps_conferencia;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getParticipacaoSocialConferenciaPorOSC($id_osc)
    {
        try {
            $ps_conferencias = $this->service->getParticipacaoSocialConferenciaPorOSC($id_osc);

            if (count($ps_conferencias) == 0)
            {
                return response()->json(['Resposta' => 'Nenhum Participação Social Conferência foi encontrado para essa OSC!'], Response::HTTP_OK);
            }

            return $ps_conferencias;
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

    public function update($id, Request $request) {
        try {
            $dados = $request->all();

            $ps_conferencia = $this->service->update($id, $dados);

            if ($ps_conferencia)
            {
                return response()->json(['Resposta' => 'Participação Social Conferência atualizado com sucesso!'], Response::HTTP_OK);
            }

            return $ps_conferencia;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_conferencia) {
        try {
            if ($this->service->delete($id_conferencia))
            {
                return response()->json(['Resposta' => 'Participação Social Conferência deletado com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
