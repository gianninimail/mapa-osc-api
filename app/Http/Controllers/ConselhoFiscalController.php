<?php

namespace App\Http\Controllers;

use App\Models\Osc\ConselhoFiscal;
use App\Services\Osc\ConselhoFiscalService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConselhoFiscalController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ConselhoFiscal $service
     */
    public function __construct(ConselhoFiscalService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            $conselho = $this->service->get($id);
            if (is_null($conselho))
            {
                return response()->json(['Resposta' => 'Item do Conselho Fiscal não encontrado!'], Response::HTTP_OK);
            }

            return $conselho;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getConselhoFiscalPorOSC($id_osc)
    {
        try {
            $conselhos = $this->service->getConselhoFiscalPorOSC($id_osc);

            if (count($conselhos) == 0)
            {
                return response()->json(['Resposta' => 'Nenhum Conselho Fiscal foi encontrado para essa OSC!'], Response::HTTP_OK);
            }

            return $conselhos;
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

            $conselho = $this->service->update($id, $dados);

            if ($conselho)
            {
                return response()->json(['Resposta' => 'Conselho Fiscal atualizado com sucesso!'], Response::HTTP_OK);
            }

            return $conselho;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_conselho) {
        try {
            if ($this->service->delete($id_conselho))
            {
                return response()->json(['Resposta' => 'Conselho Fiscal deletado com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
