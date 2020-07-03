<?php


namespace App\Repositories\Osc;

use App\Models\Osc\Osc;
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
        return $this->model->all();
    }

    public function get($id)
    {
        $osc = $this->model->find($id);

        return $osc;
    }

    public function getCabecalho($id)
    {
        //$osc = $this->model->where('id_osc', $id)->with('dados_gerais:id_osc,tx_razao_social_osc,ft_razao_social_osc,'/*im_logo,*/.'ft_logo,cd_natureza_juridica_osc,ft_natureza_juridica_osc')->get();

        $osc = $this->model->find($id);
        //dd($osc);

        $cabecalho = [
            'cd_identificador_osc' => $osc->cd_identificador_osc,
            'ft_identificador_osc' => $osc->ft_identificador_osc,
            'tx_razao_social_osc' => $osc->dados_gerais->tx_razao_social_osc,
            'ft_razao_social_osc' => $osc->dados_gerais->ft_razao_social_osc,
            'im_logo' => $osc->dados_gerais->im_logo,
            'ft_logo' => $osc->dados_gerais->ft_logo,
            'cd_natureza_juridica_osc' => $osc->dados_gerais->cd_natureza_juridica_osc,
            'tx_nome_natureza_juridica_osc' => $osc->dados_gerais->natureza_juridica->tx_nome_natureza_juridica,
            'ft_natureza_juridica_osc' => $osc->dados_gerais->ft_natureza_juridica_osc,
            'ft_natureza_juridica_osc' => $osc->dados_gerais->ft_natureza_juridica_osc,
            'dt_atualizacao' => $osc->updated_at,
        ];

        return $cabecalho;
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