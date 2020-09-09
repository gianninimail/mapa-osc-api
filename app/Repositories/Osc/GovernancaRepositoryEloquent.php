<?php


namespace App\Repositories\Osc;

use App\Models\Osc\Governanca;
use App\Repositories\Osc\GovernancaRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GovernancaRepositoryEloquent implements GovernancaRepositoryInterface
{
    private $model;

    public function __construct(Governanca $_governanca)
    {
        $this->model = $_governanca;
    }

    public function get($id)
    {
        $_governanca = $this->model->find($id);

        return $_governanca;
    }

    public function getGovernancaPorOSC($_id_osc)
    {
        $_governancas = $this->model->where('id_osc', $_id_osc)->get();

        return $_governancas;
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