<?php


namespace App\Repositories\Osc;

use App\Models\Osc\ParticipacaoSocialOutra;
use App\Repositories\Osc\ParticipacaoSocialOutraRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
                                                        
class ParticipacaoSocialOutraRepositoryEloquent implements ParticipacaoSocialOutraRepositoryInterface
{
    private $model;

    public function __construct(ParticipacaoSocialOutra $_ps_outra)
    {
        $this->model = $_ps_outra;
    }

    public function get($id)
    {
        $_outra = $this->model->find($id);

        return $_outra;
    }

    public function getParticipacaoSocialOutraPorOSC($_id_osc)
    {
        $_outras = $this->model->where('id_osc', $_id_osc)->get();

        return $_outras;
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