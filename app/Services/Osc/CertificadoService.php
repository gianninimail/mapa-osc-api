<?php


namespace App\Services\Osc;

use App\Repositories\Osc\CertificadoRepositoryInterface;

class CertificadoService
{
    private $repo;

    public function __construct(CertificadoRepositoryInterface $_repo)
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

    public function getFormatado($id)
    {
        return $this->repo->getFormatado($id);
    }

    public function getCertificadosPorOSC($id_osc)
    {
        return $this->repo->getCertificadosPorOSC($id_osc);
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id_certificado)
    {
        return $this->repo->delete($id_certificado);
    }
}