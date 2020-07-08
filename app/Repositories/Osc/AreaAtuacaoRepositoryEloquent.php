<?php


namespace App\Repositories\Osc;

use App\Models\Osc\AreaAtuacao;
use App\Repositories\Osc\AreaAtuacaoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AreaAtuacaoRepositoryEloquent implements AreaAtuacaoRepositoryInterface
{
    private $model;

    public function __construct(AreaAtuacao $_area_atuacao)
    {
        $this->model = $_area_atuacao;
    }

    public function getAreasAtuacaoPorOSC($_id_osc)
    {
        $areas_atuacao = $this->model->where('id_osc', $_id_osc)->get();

        return $areas_atuacao;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}