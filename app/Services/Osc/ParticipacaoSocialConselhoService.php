<?php


namespace App\Services\Osc;

use App\Repositories\Osc\ParticipacaoSocialConselhoRepositoryInterface;

class ParticipacaoSocialConselhoService
{
    private $repo;

    public function __construct(ParticipacaoSocialConselhoRepositoryInterface $_repo)
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

    public function getParticipacaoSocialConselhoPorOSC($id_osc)
    {
        return $this->repo->getParticipacaoSocialConselhoPorOSC($id_osc);
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id_ps_conselho)
    {
        return $this->repo->delete($id_ps_conselho);
    }
}