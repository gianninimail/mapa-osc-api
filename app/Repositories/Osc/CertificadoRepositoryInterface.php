<?php


namespace App\Repositories\Osc;


use App\Models\Osc\Certificado;
use Illuminate\Database\Eloquent\Model;

interface CertificadoRepositoryInterface
{
    public function __construct(Certificado $_certificado);

    public function getCertificadosPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}