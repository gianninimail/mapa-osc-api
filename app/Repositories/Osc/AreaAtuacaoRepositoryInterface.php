<?php


namespace App\Repositories\Osc;


use App\Models\Osc\AreaAtuacao;
use Illuminate\Database\Eloquent\Model;

interface AreaAtuacaoRepositoryInterface
{
    public function __construct(AreaAtuacao $_area_atuacao);

    public function getAreasAtuacaoPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}