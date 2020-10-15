<?php


namespace App\Repositories\Osc;

use App\Models\Osc\ParticipacaoSocialConselho;
use App\Repositories\Osc\ParticipacaoSocialConselhoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ParticipacaoSocialConselhoRepositoryEloquent implements ParticipacaoSocialConselhoRepositoryInterface
{
    private $model;

    public function __construct(ParticipacaoSocialConselho $_ps_conselho)
    {
        $this->model = $_ps_conselho;
    }

    public function get($id)
    {
        $_conselho = $this->model->find($id);

        return $_conselho;
    }

    public function getParticipacaoSocialConselhoPorOSC($_id_osc)
    {
        $_conselhos = $this->model->where('id_osc', $_id_osc)->get();

        return $_conselhos;
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