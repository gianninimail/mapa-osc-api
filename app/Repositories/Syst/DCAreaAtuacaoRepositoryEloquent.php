<?php


namespace App\Repositories\Syst;

use App\Models\Syst\DCAreaAtuacao;
use App\Repositories\Syst\DCAreaAtuacaoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DCAreaAtuacaoRepositoryEloquent implements DCAreaAtuacaoRepositoryInterface
{
    private $model;

    public function __construct(DCAreaAtuacao $_modelo)
    {
        $this->model = $_modelo;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function get($_id)
    {
        $areas_atuacao = $this->model->find($_id);

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