<?php


namespace App\Repositories\Osc;

use App\Models\Osc\RelacoesTrabalho;
use App\Repositories\Osc\RelacoesTrabalhoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class RelacoesTrabalhoRepositoryEloquent implements RelacoesTrabalhoRepositoryInterface
{
    private $model;

    public function __construct(RelacoesTrabalho $_relacoes)
    {
        $this->model = $_relacoes;
    }

    public function get($id)
    {
        $relacoes = $this->model->find($id);

        return $relacoes;
    }

    public function getRelacoesTrabalhoPorOSC($_id_osc)
    {
        $relacoes = $this->model->where('id_osc', $_id_osc)->get();

        return $relacoes;
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