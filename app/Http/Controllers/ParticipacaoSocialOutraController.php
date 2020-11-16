<?php

namespace App\Http\Controllers;

use App\Models\Osc\ParticipacaoSocialOutra;
use App\Services\Osc\ParticipacaoSocialOutraService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParticipacaoSocialOutraController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ParticipacaoSocialOutraService $service
     */
    public function __construct(ParticipacaoSocialOutraService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            $ps_outra = $this->service->get($id);
            if (is_null($ps_outra))
            {
                return response()->json(['Resposta' => 'Item Participação Social Outros Espaços não encontrado!'], Response::HTTP_OK);
            }

            return $ps_outra;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
                   
    public function getParticipacaoSocialOutraPorOSC($id_osc)
    {
        try {
            $outras = $this->service->getParticipacaoSocialOutraPorOSC($id_osc);

            if (count($outras) == 0)
            {
                return response()->json(['Resposta' => 'Nenhum Participação Social Outros Espaços foi encontrado para essa OSC!'], Response::HTTP_OK);
            }

            return $outras;
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

            $outra = $this->service->update($id, $dados);

            if ($outra)
            {
                return response()->json(['Resposta' => 'Participação Social Outra atualizado com sucesso!'], Response::HTTP_OK);
            }

            return $outra;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_outra) {
        try {
            if ($this->service->delete($id_outra))
            {
                return response()->json(['Resposta' => 'Participação Social Outra deletado com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
