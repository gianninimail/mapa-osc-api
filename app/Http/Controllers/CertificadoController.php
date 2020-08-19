<?php

namespace App\Http\Controllers;

use App\Models\Osc\Certificado;
use App\Services\Osc\CertificadoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificadoController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param CertificadoService $service
     */
    public function __construct(CertificadoService $_service)
    {
        $this->service = $_service;
    }

    public function get($id)
    {
        try {
            return response()->json($this->service->get($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getFormatado($id)
    {
        try {
            return response()->json($this->service->getFormatado($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getCertificadosPorOSC($id_osc)
    {
        try {
            return response()->json($this->service->getCertificadosPorOSC($id_osc), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request) {
        try {
            $dados = $request->all();

            return response()->json($this->service->store($dados), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, Request $request) {
        try {
            $dados = $request->all();

            return response()->json($this->service->update($id, $dados), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id_certificado) {
        try {
            if ($this->service->delete($id_certificado))
            {
                return response()->json(['Resposta' => 'Certificado deletado com sucesso!'], Response::HTTP_OK);
            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
