<?php


namespace App\Repositories\Osc;


use App\Models\Osc\ParticipacaoSocialConselho;
use Illuminate\Database\Eloquent\Model;

interface ParticipacaoSocialConselhoRepositoryInterface
{
    public function __construct(ParticipacaoSocialConselho $_ps_conselho);

    public function get($id);

    public function getParticipacaoSocialConselhoPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}