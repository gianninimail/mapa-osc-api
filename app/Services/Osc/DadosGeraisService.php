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

    public function getDescricao($id)
    {
        return $this->repo->getDescricao($id);
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function updateDescricao($id, array $data)
    {
        return $this->repo->updateDescricao($id, $data);
    }
}