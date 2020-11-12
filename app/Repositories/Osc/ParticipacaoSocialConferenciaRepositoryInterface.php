<?php


namespace App\Repositories\Osc;


use App\Models\Osc\ParticipacaoSocialConferencia;
use Illuminate\Database\Eloquent\Model;

interface ParticipacaoSocialConferenciaRepositoryInterface
{
    public function __construct(ParticipacaoSocialConferencia $_ps_conferencia);

    public function get($id);

    public function getParticipacaoSocialConferenciaPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}