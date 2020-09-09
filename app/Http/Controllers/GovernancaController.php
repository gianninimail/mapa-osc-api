<?php

namespace App\Http\Controllers;

use App\Models\Osc\Governanca;
use App\Services\Osc\GovernancaService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GovernancaController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param GovernancaService $service
     */
    public function __construct(GovernancaService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            $governanca = $this->service->get($id);
            if (is_null($governanca))
            {
                return response()->json(['Resposta' => 'Governança não encontrada!'], Response::HTTP_OK);
            }

            return $governanca;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getGovernancaPorOSC($id_osc)
    {
        try {
            $governancas = $this->service->getGovernancaPorOSC($id_osc);

            if (count($governancas) == 0)
            {
                return response()->json(['Resposta' => 'Nenhuma Governança foi encontrada para essa OSC!'], Response::HTTP_OK);
            }

            return $governancas;
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

            $governanca = $this->service->update($id, $dados);

            if ($governanca)
            {
                return response()->json(['Resposta' => 'Governança atualizada com sucesso!'], Response::HTTP_OK);
            }

            return $governanca;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_governanca) {
        try {
            if ($this->service->delete($id_governanca))
            {
                return response()->json(['Resposta' => 'Governança deletada com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
