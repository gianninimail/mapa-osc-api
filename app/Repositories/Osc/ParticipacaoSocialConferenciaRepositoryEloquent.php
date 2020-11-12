<?php


namespace App\Repositories\Osc;

use App\Models\Osc\ParticipacaoSocialConferencia;
use App\Repositories\Osc\ParticipacaoSocialConferenciaRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ParticipacaoSocialConferenciaRepositoryEloquent implements ParticipacaoSocialConferenciaRepositoryInterface
{
    private $model;

    public function __construct(ParticipacaoSocialConferencia $_ps_conferencia)
    {
        $this->model = $_ps_conferencia;
    }

    public function get($id)
    {
        $_ps_conferencia = $this->model->find($id);

        return $_ps_conferencia;
    }

    public function getParticipacaoSocialConferenciaPorOSC($_id_osc)
    {
        $_ps_conferencias = $this->model->where('id_osc', $_id_osc)->get();

        return $_ps_conferencias;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}