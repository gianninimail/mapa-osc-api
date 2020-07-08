<?php


namespace App\Repositories\Osc;

use App\Models\Osc\Projeto;
use App\Repositories\Osc\ProjetoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProjetoRepositoryEloquent implements ProjetoRepositoryInterface
{
    private $model;

    public function __construct(Projeto $_projeto)
    {
        $this->model = $_projeto;
    }

    public function getProjetosPorOSC($_id_osc)
    {
        $projeto = $this->model->where('id_osc', $_id_osc)->get();

        return $projeto;
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