<?php


namespace App\Services\Osc;

use App\Repositories\Osc\FonteRecursosRepositoryInterface;

class FonteRecursosService
{
    private $repo;

    public function __construct(FonteRecursosRepositoryInterface $_repo)
    {
        $this->repo = $_repo;
    }

    public function getFonteRecursosPorOSC($id_osc)
    {
        return $this->repo->getFonteRecursosPorOSC($id_osc);
    }

    public function getAnoFonteRecursosPorOSC($id_osc)
    {
        return $this->repo->getAnoFonteRecursosPorOSC($id_osc);
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