<?php


namespace App\Services\Osc;

use App\Repositories\Osc\GovernancaRepositoryInterface;

class GovernancaService
{
    private $repo;

    public function __construct(GovernancaRepositoryInterface $_repo)
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

    public function getGovernancaPorOSC($id_osc)
    {
        return $this->repo->getGovernancaPorOSC($id_osc);
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id_governanca)
    {
        return $this->repo->delete($id_governanca);
    }
}