<?php


namespace App\Repositories\Osc;


use App\Models\Osc\DadosGerais;
use Illuminate\Database\Eloquent\Model;

interface DadosGeraisRepositoryInterface
{
    public function __construct(DadosGerais $__dados_gerais);

    public function getDescricao($id);

    public function store(array $data);

    public function updateDescricao($id, array $data);

    public function destroy($id);
}