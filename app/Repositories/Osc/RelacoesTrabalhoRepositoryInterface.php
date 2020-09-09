<?php


namespace App\Repositories\Osc;


use App\Models\Osc\RelacoesTrabalho;
use Illuminate\Database\Eloquent\Model;

interface RelacoesTrabalhoRepositoryInterface
{
    public function __construct(RelacoesTrabalho $_relacao);

    public function get($id);

    public function getRelacoesTrabalhoPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}