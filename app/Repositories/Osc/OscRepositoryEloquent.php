<?php


namespace App\Repositories\Osc;

use App\Models\Osc\Osc;
use App\Models\Syst\DCAreaAtuacao;
use App\Repositories\Osc\OscRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OscRepositoryEloquent implements OscRepositoryInterface
{
    private $model;

    public function __construct(Osc $_osc)
    {
        $this->model = $_osc;
    }

    public function getAll()
    {
        return $this->model->all();//->whereIn('id_representacao', [1, 250, 251]);//->orderBy('id_representacao', 'asc');
    }

    public function get($id)
    {
        $osc = $this->model->find($id);

        return $osc;

        //MANEIRAS DE EFETUAR CONSULTAS COM RELACIONAMENTOS
        //$osc = $this->model->with('dados_gerais:tx_razao_social_osc')->where('id_osc', $id)->get();

        /*
        //$dados_gerais = $osc->dados_gerais;
        $areas_atuacao = $osc->areasAtuacao;
        $dc_areas_atuacao = $areas_atuacao[0]->dc_area_atuacao;
        $dc_subareas_atuacao = $areas_atuacao[0]->dc_subarea_atuacao;
        $subareas_atuacao = $dc_areas_atuacao->dc_subarea_atuacao;
        //$teste = DCAreaAtuacao::find($ida);
        //$subareas_atuacao = $areas_atuacao->
        $localizacao = $osc->localizacao;
        $recursos = $osc->recursos;
        $relacoesTrabalho = $osc->relacoesTrabalho;
        */
    }

    public function getDescricao($id)
    {
        //$osc = $this->model->find($id);
        //$osc = $this->model->find($id)->with('dados_gerais');
        $osc = $this->model->with('dados_gerais:id_osc,tx_finalidades_estatutarias,tx_historico,tx_link_estatuto_osc,tx_missao_osc,tx_visao_osc')->where('id_osc', $id)->get();

        //$dados = $osc->dados_gerais;

        return $osc;
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