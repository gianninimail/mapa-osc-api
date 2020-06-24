<?php


namespace App\Services\Osc;

use App\Repositories\Osc\DadosGeraisRepositoryInterface;

class DadosGeraisService
{
    private $repo;

    public function __construct(DadosGeraisRepositoryInterface $_repo)
    {
        $this->repo = $_repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getDescricao($id)
    {
        return $this->repo->getDescricao($id);
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}