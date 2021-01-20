<?php

namespace App\Http\Controllers;

use App\Models\Osc\FonteRecursos;
use App\Services\Osc\FonteRecursosService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FonteRecursosController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param FonteRecursosService $service
     */
    public function __construct(FonteRecursosService $_service)
    {
        $this->service = $_service;
    }

    public function getFonteRecursosPorOSC($id_osc)
    {
        try {
            return response()->json($this->service->getFonteRecursosPorOSC($id_osc), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //cd_fonte_recurso_osc + ano formatado (yyyy)
    public function getAnoFonteRecursosPorOSC($id_osc, $ano)
    {
        try {
            return response()->json($this->service->getAnoFonteRecursosPorOSC($id_osc, $ano), Response::HTTP_OK);
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
