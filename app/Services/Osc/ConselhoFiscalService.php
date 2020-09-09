<?php


namespace App\Services\Osc;

use App\Repositories\Osc\ConselhoFiscalRepositoryInterface;

class ConselhoFiscalService
{
    private $repo;

    public function __construct(ConselhoFiscalRepositoryInterface $_repo)
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

    public function getConselhoFiscalPorOSC($id_osc)
    {
        return $this->repo->getConselhoFiscalPorOSC($id_osc);
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id_conselho)
    {
        return $this->repo->delete($id_conselho);
    }
}