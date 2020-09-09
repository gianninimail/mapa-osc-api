<?php


namespace App\Repositories\Osc;


use App\Models\Osc\ConselhoFiscal;
use Illuminate\Database\Eloquent\Model;

interface ConselhoFiscalRepositoryInterface
{
    public function __construct(ConselhoFiscal $_conselho);

    public function get($id);

    public function getConselhoFiscalPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}