<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/', function () use ($router) {
        return ["description: API de dados do Mapa das Organizações da Sociedade Civil.",
        "version: 3.0.0",
        "homepage: https://mapaosc.ipea.gov.br/",
        "keywords: 'php', 'lumen', 'api', 'rest', 'server, 'http', 'json', 'mapaosc', 'ipea'",
        "license: LGPL-3.0",
        "authors: {Thiago Giannini Ramos}"
    ];
});

$router->post('/api/user/', 'UsuarioController@store');

$router->group(['prefix' => '/api/osc'], function() use ($router){

    //ROTAS GERAIS DO MODELO OSC
    $router->get('/', 'OscController@getAll');
    $router->get('/{id}', 'OscController@get');
    $router->post('/', 'OscController@store');
    $router->put('/{id}', 'OscController@update');
    $router->delete('/{id}', 'OscController@destroy');

    //INFORMAÇÕES PARA O GRÁFICO
    //$router->get('/total_oscs/', 'OscController@getNumeroTotalOSCs');
    //$router->get('/osc_com_certificacoes/', 'OscController@getNumeroOSCcomCertificacoes');

    //INFORMAÇÕES DE CABEÇALHO
    $router->get('/cabecalho/{id}', 'OscController@getCabecalho');

    //INFORMAÇÕES DE DADOS GERAIS
    $router->get('/dados_gerais/{id}', 'OscController@getDadosGerais');
    $router->put('/dados_gerais/{id}', 'OscController@updateDadosGerais');

    //INFORMAÇÕES DE AREA E SUBAREA DE ATUAÇÃO DA OSC
    $router->get('/areas_atuacao/{id_osc}', 'AreaAtuacaoController@getAreasAtuacaoPorOSC');
    $router->put('/areas_atuacao/{id_osc}', 'AreaAtuacaoController@updateAreasAtuacaoPorOSC');

    //INFORMAÇÕES DE DESCRIÇÃO DA OSC
    $router->get('/descricao/{id}', 'DadosGeraisController@getDescricao');
    $router->put('/descricao/{id}', 'DadosGeraisController@updateDescricao');

    //INFORMAÇÕES DE TITULAÇÕES E CERTIFICAÇÕES
    $router->get('/certificado/{id}', 'CertificadoController@get');
    $router->post('/certificado/', 'CertificadoController@store');
    $router->get('/certificados/{id_osc}', 'CertificadoController@getCertificadosPorOSC');
    //$router->put('/certificados/{id_osc}', 'CertificadoController@updateCertificados');
    $router->delete('/certificado/{id_osc}', 'CertificadoController@delete');
    $router->put('/certificado/{id}', 'CertificadoController@update');

    //INFORMAÇÕES DAS RELAÇÕES DE TRABALHO E GOVERNANÇA
    $router->get('/rel_trabalho_e_governanca/{id_osc}', 'OscController@getRelTrabalhoAndGovernanca');
    //---------------------Relações de Trabalho-----------------------------------//
    $router->get('/rel_trabalho/{id_osc}', 'RelacoesTrabalhoController@get');
    $router->put('/rel_trabalho/{id_osc}', 'RelacoesTrabalhoController@update');
    //$router->get('/rel_trabalho/{id}', 'RelacoesTrabalhoController@get');
    //---------------------Governança----------------------------------------------//
    $router->get('/governanca/{id}', 'GovernancaController@get');
    $router->put('/governanca/{id}', 'GovernancaController@update');
    $router->post('/governanca/', 'GovernancaController@store');
    $router->delete('/governanca/{id}', 'GovernancaController@delete');
    //---------------------Conselho Fiscal----------------------------------------------//
    $router->get('/conselho/{id}', 'ConselhoFiscalController@get');
    $router->post('/conselho/', 'ConselhoFiscalController@store');
    $router->put('/conselho/{id}', 'ConselhoFiscalController@update');
    $router->delete('/conselho/{id}', 'ConselhoFiscalController@delete');


    //INFORMAÇÕES DE ESPAÇOS DE PARTICIPAÇÃO SOCIAL
    $router->get('/participacao_social/{id}', 'OscController@getParticipacaoSocial');

    //ESPAÇOS DE PARTICIPAÇÃO SOCIAL CONSELHO
    $router->get('/ps_conselho/{id}', 'ParticipacaoSocialConselhoController@get');
    $router->get('/ps_conselhos/{id}', 'ParticipacaoSocialConselhoController@getParticipacaoSocialConselhoPorOSC');
    $router->post('/ps_conselho/', 'ParticipacaoSocialConselhoController@store');
    $router->put('/ps_conselho/{id}', 'ParticipacaoSocialConselhoController@update');
    $router->delete('/ps_conselho/{id}', 'ParticipacaoSocialConselhoController@delete');

    //ESPAÇOS DE PARTICIPAÇÃO SOCIAL CONFERẼNCIA
    $router->get('/ps_conferencia/{id}', 'ParticipacaoSocialConselhoController@get');
    $router->get('/ps_conferencia/{id}', 'ParticipacaoSocialConselhoController@getParticipacaoSocialConferenciaPorOSC');
    $router->post('/ps_conferencia/', 'ParticipacaoSocialConselhoController@store');
    $router->put('/ps_conferencia/{id}', 'ParticipacaoSocialConselhoController@update');
    $router->delete('/ps_conferencia/{id}', 'ParticipacaoSocialConselhoController@delete');

    //INFORMAÇÕES DE PROJETOS
    $router->get('/projetos/{id_osc}', 'ProjetoController@getProjetosPorOSC');

    //INFORMAÇÕES DE FONTES DE RECURSOS DA OSC
    $router->get('/fonte_recursos/{id_osc}', 'FonteRecursosController@getFonteRecursosPorOSC');
    $router->get('/anos_fonte_recursos/{id_osc}', 'FonteRecursosController@getAnoFonteRecursosPorOSC');
});


/*
$router->group(['prefix' => "/api/osc/"], function () use ($router) {
    $router->get('/barratransparencia/{id_osc}', 'App\Http\Controllers\AnalisesController@obterBarraTransparenciaOsc');
    $router->get('/listaatualizadas', 'App\Http\Controllers\AnalisesController@obterListaOscsAtualizadas');
    $router->get('/listaatualizadas/{limit}', 'App\Http\Controllers\AnalisesController@obterListaOscsAtualizadas');
    $router->get('/listaareaatuacao/{cd_area_atuacao}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacao');
    $router->get('/listaareaatuacao/{cd_area_atuacao}/{limit}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacao');
    $router->get('/listaareaatuacao/{cd_area_atuacao}/municipio/{cd_municipio}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacaoMunicipio');
    $router->get('/listaareaatuacao/{cd_area_atuacao}/municipio/{cd_municipio}/{limit}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacaoMunicipio');
    $router->get('/listaareaatuacao/{cd_area_atuacao}/geolocalizacao/{latitude}/{longitude}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacaoGeolocalizacao');
    $router->get('/listaareaatuacao/{cd_area_atuacao}/geolocalizacao/{latitude}/{longitude}/{limit}', 'App\Http\Controllers\AnalisesController@obterListaOscsAreaAtuacaoGeolocalizacao');

    $router->get('/no_project/{id}', 'App\Http\Controllers\OscController@getOscNoProject');
    $router->get('/{id}', 'App\Http\Controllers\OscController@get');

    $router->get('/dataatualizacao/{id_osc}', 'App\Http\Controllers\OscController@obterDataAtualizacao');
    $router->get('/popup/{id_osc}', 'App\Http\Controllers\OscController@obterPopup');
    $router->get('/cabecalho/{id_osc}', 'App\Http\Controllers\OscController@obterCabecalho');
    $router->get('/dados_gerais/{id_osc}', 'App\Http\Controllers\OscController@obterDadosGerais');
    $router->get('/descricao/{id_osc}', 'App\Http\Controllers\OscController@obterDescricao');
    $router->get('/area_atuacao/{id_osc}', 'App\Http\Controllers\OscController@obterAreaAtuacao');
    $router->get('/certificado/{id_osc}', 'App\Http\Controllers\OscController@obterCertificados');
    $router->get('/participacao_social/{id_osc}', 'App\Http\Controllers\OscController@obterParticipacaoSocial');
    $router->get('/relacoes_trabalho_governanca/{id_osc}', 'App\Http\Controllers\OscController@obterRelacoesTrabalhoGovernanca');
    $router->get('/recursos/{id_osc}', 'App\Http\Controllers\OscController@obterRecursos');
    $router->get('/projeto/{id}', 'App\Http\Controllers\ProjetoController@obterProjetos');
    $router->get('/projeto_abreviado/{id}', 'App\Http\Controllers\ProjetoController@obterProjetos');
    $router->get('/{component}/{id}', 'App\Http\Controllers\OscController@getComponentOsc');

});

*/
