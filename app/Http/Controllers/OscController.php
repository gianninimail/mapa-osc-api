<?php

namespace App\Http\Controllers;

use App\Services\Osc\OscService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class OscController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param OscService $service
     */
    public function __construct(OscService $_service)
    {
        $this->service = $_service;
    }

    public function getAll()
    {
        try {
            return response()->json($this->service->getAll(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
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

    public function getCabecalho($id)
    {
        try {
            return response()->json($this->service->getCabecalho($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDadosGerais($id)
    {
        try {
            return response()->json($this->service->getDadosGerais($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateDadosGerais($id, Request $request)
    {
        try {

            $data = $request->all();

            $dados_gerais = $this->service->updateDadosGerais($id, $data);

            if (!$dados_gerais)
            {
                return response()->json(['Resposta' => 'Objeto não encontrado!'], Response::HTTP_OK);
            }

            return \response()->json($dados_gerais, Response::HTTP_OK);

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

    public function getRelTrabalhoAndGovernanca($id)
    {
        try {
            return response()->json($this->service->getRelTrabalhoAndGovernanca($id), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getParticipacaoSocial($id)
    {
        try {
            return response()->json($this->service->getParticipacaoSocial($id), Response::HTTP_OK);
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
