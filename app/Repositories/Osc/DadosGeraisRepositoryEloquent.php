<?php


namespace App\Repositories\Osc;

use App\Models\Osc\DadosGerais;
use App\Repositories\Osc\DadosGeraisRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DadosGeraisRepositoryEloquent implements DadosGeraisRepositoryInterface
{
    private $model;

    public function __construct(DadosGerais $_dados_gerais)
    {
        $this->model = $_dados_gerais;
    }

    public function getAll()
    {
        return $this->model->all();//->whereIn('id_representacao', [1, 250, 251]);//->orderBy('id_representacao', 'asc');
    }

    public function get($id)
    {
        $dados_gerais = $this->model->find($id);

        return $dados_gerais;
    }

    public function getDescricao($id)
    {
        $dados_gerais = $this->model->find($id,
            [
                'id_osc'
                ,'tx_finalidades_estatutarias'
                ,'tx_historico'
                ,'tx_link_estatuto_osc'
                ,'tx_missao_osc'
                ,'tx_visao_osc'
            ]
        );

        return $dados_gerais;
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