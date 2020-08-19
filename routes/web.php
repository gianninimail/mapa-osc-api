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

$router->group(['prefix' => "/api/osc"], function() use ($router){

    //ROTAS GERAIS DO MODELO OSC
    $router->get('/', 'OscController@getAll');
    $router->get("/{id}", 'OscController@get');
    $router->post("/", "OscController@store");
    $router->put("/{id}", "OscController@update");
    $router->delete("/{id}", "OscController@destroy");

    //INFORMAÇÕES DE CABEÇALHO
    $router->get("/cabecalho/{id}", 'OscController@getCabecalho');

    //INFORMAÇÕES DE DADOS GERAIS
    $router->get("/dados_gerais/{id}", 'OscController@getDadosGerais');
    $router->put("/dados_gerais/{id}", 'OscController@updateDadosGerais');

    //INFORMAÇÕES DE AREA E SUBAREA DE ATUAÇÃO DA OSC
    $router->get('/areas_atuacao/{id_osc}', 'AreaAtuacaoController@getAreasAtuacaoPorOSC');
    $router->put('/areas_atuacao/{id_osc}', 'AreaAtuacaoController@updateAreasAtuacaoPorOSC');

    //INFORMAÇÕES DE DESCRIÇÃO DA OSC
    $router->get('/descricao/{id}', 'DadosGeraisController@getDescricao');
    $router->put('/descricao/{id}', 'DadosGeraisController@updateDescricao');

    //INFORMAÇÕES DE TITULAÇÕES E CERTIFICAÇÕES
    $router->post('/certificados/{id_osc}', 'CertificadoController@store');
    $router->get('/certificados/{id_osc}', 'CertificadoController@getCertificadosPorOSC');
    $router->put('/certificados/{id_osc}', 'CertificadoController@updateCertificados');
    $router->delete('/certificados/{id_osc}', 'CertificadoController@delete');

    //INFORMAÇÕES DAS RELAÇÕES DE TRABALHO E GOVERNANÇA
    $router->get("/rel_trabalho_e_governanca/{id}", 'OscController@getRelTrabalhoAndGovernanca');

    //INFORMAÇÕES DE ESPAÇOS DE PARTICIPAÇÃO SOCIAL
    $router->get("/participacao_social/{id}", 'OscController@getParticipacaoSocial');

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
