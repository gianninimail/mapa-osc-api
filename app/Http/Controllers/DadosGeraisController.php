<?php

namespace App\Http\Controllers;

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

    public function getDescricao($id)
    {
        try {
            return response()->json($this->service->getDescricao($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request) {
        //return [];
        //return ['tx_email_usuario' => 'teste@gmail.com'];
        //return ['tx_nome_usuario' => '', 'tx_email_usuario' => '', 'tx_senha_usuario' => ''];

        //$user = new Usuario($request->all());

        //return $user;
    }
}
