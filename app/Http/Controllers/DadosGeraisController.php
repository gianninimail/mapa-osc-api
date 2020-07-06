<?php

namespace App\Http\Controllers;

use App\Models\Osc\DadosGerais;
use App\Services\Osc\DadosGeraisService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DadosGeraisController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param DadosGeraisService $service
     */
    public function __construct(DadosGeraisService $_service)
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
            return response()->json($this->service->getDescricao($id), Response::HTTP_OK);
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

    public function updateFormatado($id, Request $request) {
        try {
            $dados = $request->all();

            return response()->json($this->service->update($id, $dados), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
