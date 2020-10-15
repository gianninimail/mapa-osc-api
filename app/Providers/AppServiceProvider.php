<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Mapeamento das Interfaces para Classes Concretas
        $this->app->bind(
            'App\Repositories\Portal\RepresentacaoRepositoryInterface', 'App\Repositories\Portal\RepresentacaoRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\OscRepositoryInterface', 'App\Repositories\Osc\OscRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\DadosGeraisRepositoryInterface', 'App\Repositories\Osc\DadosGeraisRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\AreaAtuacaoRepositoryInterface', 'App\Repositories\Osc\AreaAtuacaoRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\CertificadoRepositoryInterface', 'App\Repositories\Osc\CertificadoRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\ProjetoRepositoryInterface', 'App\Repositories\Osc\ProjetoRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\FonteRecursosRepositoryInterface', 'App\Repositories\Osc\FonteRecursosRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\RelacoesTrabalhoRepositoryInterface', 'App\Repositories\Osc\RelacoesTrabalhoRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\GovernancaRepositoryInterface', 'App\Repositories\Osc\GovernancaRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\ConselhoFiscalRepositoryInterface', 'App\Repositories\Osc\ConselhoFiscalRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Osc\ParticipacaoSocialConselhoRepositoryInterface', 'App\Repositories\Osc\ParticipacaoSocialConselhoRepositoryEloquent'
        );

        //DADOS DO SCHEMA SYST
        $this->app->bind(
            'App\Repositories\Syst\DCAreaAtuacaoRepositoryInterface', 'App\Repositories\Syst\DCAreaAtuacaoRepositoryEloquent'
        );
    }
}
