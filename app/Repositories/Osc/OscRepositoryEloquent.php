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

    public function getDadosGerais($id)
    {
        $osc = $this->model->find($id);

        $dados_gerais = [
            //DADOS GERAIS
            'tx_sigla_osc' => $osc->dados_gerais->tx_sigla_osc,
            'ft_sigla_osc' => $osc->dados_gerais->ft_sigla_osc,
            'tx_nome_fantasia_osc' => $osc->dados_gerais->tx_nome_fantasia_osc,
            'ft_nome_fantasia_osc' => $osc->dados_gerais->ft_nome_fantasia_osc,
            'tx_resumo_osc' => $osc->dados_gerais->tx_resumo_osc,
            'ft_resumo_osc' => $osc->dados_gerais->ft_resumo_osc,
            'cd_classe_atividade_economica_osc' => $osc->dados_gerais->cd_classe_atividade_economica_osc,//É A ATIVIDADE ECONÔMICA, N SEI PQ TROCARAM
            'tx_nome_classe_atividade_economica' => $osc->dados_gerais->classe_atividade_economica === null ? "" : $osc->dados_gerais->classe_atividade_economica->tx_nome_classe_atividade_economica,//É A ATIVIDADE ECONÔMICA, N SEI PQ TROCARAM
            'ft_classe_atividade_economica_osc' => $osc->dados_gerais->ft_classe_atividade_economica_osc,//É A ATIVIDADE ECONÔMICA, N SEI PQ TROCARAM
            'tx_nome_responsavel_legal' => $osc->dados_gerais->tx_nome_responsavel_legal,
            'ft_nome_responsavel_legal' => $osc->dados_gerais->ft_nome_responsavel_legal,
            'cd_situacao_imovel_osc' => $osc->dados_gerais->cd_situacao_imovel_osc,
            'tx_nome_situacao_imovel_osc' => $osc->dados_gerais->situacao_imovel === null ? "" : $osc->dados_gerais->situacao_imovel->tx_nome_situacao_imovel,//É A ATIVIDADE ECONÔMICA, N SEI PQ TROCARAM
            'ft_situacao_imovel_osc' => $osc->dados_gerais->ft_situacao_imovel_osc,
            'dt_ano_cadastro_cnpj' => $osc->dados_gerais->dt_ano_cadastro_cnpj,
            'ft_ano_cadastro_cnpj' => $osc->dados_gerais->ft_ano_cadastro_cnpj,
            'dt_fundacao_osc' => $osc->dados_gerais->dt_fundacao_osc,
            'ft_fundacao_osc' => $osc->dados_gerais->ft_fundacao_osc,
            //LOCALIZAÇÃO
            'tx_endereco' => $osc->localizacao->tx_endereco,
            'ft_endereco' => $osc->localizacao->ft_endereco,
            'nr_localizacao' => $osc->localizacao->nr_localizacao,
            'ft_localizacao' => $osc->localizacao->ft_localizacao,
            'tx_endereco_complemento' => $osc->localizacao->tx_endereco_complemento,
            'ft_endereco_complemento' => $osc->localizacao->ft_endereco_complemento,
            'tx_bairro' => $osc->localizacao->tx_bairro,
            'ft_bairro' => $osc->localizacao->ft_bairro,
            'cd_municipio' => $osc->localizacao->cd_municipio,
            'tx_nome_municipio' => $osc->localizacao->municipio->edmu_nm_municipio,
            'ft_municipio' => $osc->localizacao->ft_municipio,
            'tx_nome_uf' => $osc->localizacao->municipio === null ? "" : $osc->localizacao->municipio->uf->eduf_nm_uf,
            'tx_sigla_uf' => $osc->localizacao->municipio === null ? "" : $osc->localizacao->municipio->uf->eduf_sg_uf,
            //'ft_uf' => $osc->localizacao->municipio->uf->eduf_sg_uf//MESMA FONTE DO MUNICIPIO PODE REPETIR
            'nr_cep' => $osc->localizacao->nr_cep,
            'ft_cep' => $osc->localizacao->ft_cep,
            'geo_localizacao' => $osc->localizacao->geo_localizacao,//,'geo_lat','geo_lng' | VER COMO CONVERTER DEPOIS
            //CONTATOS
            'tx_site' => $osc->contato->tx_site,
            'ft_site' => $osc->contato->ft_site,
            'tx_email' => $osc->contato->tx_email,
            'ft_email' => $osc->contato->ft_email,
            'tx_telefone' => $osc->contato->tx_telefone,
            'ft_telefone' => $osc->contato->ft_telefone,
            'bo_nao_possui_site' => $osc->contato->bo_nao_possui_site,
            'bo_nao_possui_email' => $osc->contato->bo_nao_possui_email,
            'bo_nao_possui_sigla_osc' => $osc->contato->bo_nao_possui_sigla_osc,
        ];
        return $dados_gerais;
    }

    public function getRelTrabalhoAndGovernanca($id)
    {
        $osc = $this->model->find($id);

        $relacoes_trabalho = $osc->relacoes_trabalho;

        $nr_trabalhores = $osc->relacoes_trabalho->nr_trabalhadores_vinculo + $osc->relacoes_trabalho->nr_trabalhadores_deficiencia + $osc->relacoes_trabalho->nr_trabalhadores_voluntarios;

        $relacoes_trabalho['nr_trabalhores'] = $nr_trabalhores;

        //dd($relacoes_trabalho);
        //$relacoes_trabalho[] =

        $dados = [
            //DADOS GERAIS
            'governanca' => $osc->quadro_de_dirigentes,
            'conselho_fiscal' => $osc->conselho_fiscal,
            'relacoes_trabalho' => $relacoes_trabalho,
        ];

        return $dados;
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