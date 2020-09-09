<?php


namespace App\Repositories\Osc;

use App\Models\Osc\ConselhoFiscal;
use App\Repositories\Osc\ConselhoFiscalRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ConselhoFiscalRepositoryEloquent implements ConselhoFiscalRepositoryInterface
{
    private $model;

    public function __construct(ConselhoFiscal $_conselho)
    {
        $this->model = $_conselho;
    }

    public function get($id)
    {
        $_conselho = $this->model->find($id);

        return $_conselho;
    }

    public function getConselhoFiscalPorOSC($_id_osc)
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