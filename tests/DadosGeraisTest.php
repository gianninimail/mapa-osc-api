<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DadosGeraisTest extends TestCase
{

    public function testSelectDadosGerais()
    {
        $this->get('/api/osc/descricao/789809');
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id_osc', $resposta);
        $this->assertArrayHasKey('tx_finalidades_estatutarias', $resposta);
        $this->assertArrayHasKey('tx_historico', $resposta);
        $this->assertArrayHasKey('tx_link_estatuto_osc', $resposta);
        $this->assertArrayHasKey('tx_missao_osc', $resposta);
        $this->assertArrayHasKey('tx_visao_osc', $resposta);
    }

    public function testUpdateDadosGerais()
    {
        $dados = [
            //'id_osc' => '789809',
            'tx_finalidades_estatutarias' => '67856785',
            'tx_historico' => 'Teste de Alteração do Histórico 2',
            'tx_link_estatuto_osc' => 'Teste de Link 2',
            'tx_missao_osc' => 'Teste de Alteração de Missão 2',
            'tx_visao_osc' => 'Teste de Alteração de Visão 2',
            ];

        $this->put('/api/osc/descricao/789809', $dados);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        //$this->assertArrayHasKey('id_osc', $resposta);
        $this->assertArrayHasKey('tx_finalidades_estatutarias', $resposta);
        $this->assertArrayHasKey('tx_historico', $resposta);
        $this->assertArrayHasKey('tx_link_estatuto_osc', $resposta);
        $this->assertArrayHasKey('tx_missao_osc', $resposta);
        $this->assertArrayHasKey('tx_visao_osc', $resposta);
    }
}
