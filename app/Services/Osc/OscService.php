<?php


namespace App\Services\Osc;

use App\Repositories\Osc\OscRepositoryInterface;

class OscService
{
    private $repo;

    public function __construct(OscRepositoryInterface $_repo)
    {
        $this->repo = $_repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function getCabecalho($id)
    {
        return $this->repo->getCabecalho($id);
    }

    public function getDadosGerais($id)
    {
        return $this->repo->getDadosGerais($id);
    }

    public function updateDadosGerais($id, $dados)
    {
        return $this->repo->updateDadosGerais($id, $dados);
    }

    public function getRelTrabalhoAndGovernanca($id)
    {
        return $this->repo->getRelTrabalhoAndGovernanca($id);
    }

    public function getParticipacaoSocial($id)
    {
        return $this->repo->getParticipacaoSocial($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}