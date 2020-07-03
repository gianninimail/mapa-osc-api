<?php

namespace App\Http\Controllers;

use App\Models\Osc\Projeto;
use App\Services\Osc\ProjetoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjetoController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ProjetoService $service
     */
    public function __construct(ProjetoService $_service)
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

    public function getProjetosPorOSC($id_osc)
    {
        try {
            return response()->json($this->service->getProjetosPorOSC($id_osc), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request) {

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
}
