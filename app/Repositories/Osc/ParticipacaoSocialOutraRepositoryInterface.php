<?php


namespace App\Repositories\Osc;


use App\Models\Osc\ParticipacaoSocialOutra;
use Illuminate\Database\Eloquent\Model;

interface ParticipacaoSocialOutraRepositoryInterface
{
    public function __construct(ParticipacaoSocialOutra $_ps_outra);

    public function get($id);

    public function getParticipacaoSocialOutraPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}