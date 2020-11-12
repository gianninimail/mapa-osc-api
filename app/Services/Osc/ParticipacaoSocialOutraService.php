<?php


namespace App\Services\Osc;

use App\Repositories\Osc\ParticipacaoSocialOutraRepositoryInterface;

class ParticipacaoSocialOutraService
{
    private $repo;

    public function __construct(ParticipacaoSocialOutraRepositoryInterface $_repo)
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

    public function getParticipacaoSocialOutraPorOSC($id_osc)
    {
        return $this->repo->getParticipacaoSocialOutraPorOSC($id_osc);
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id_ps_outra)
    {
        return $this->repo->delete($id_ps_outra);
    }
}