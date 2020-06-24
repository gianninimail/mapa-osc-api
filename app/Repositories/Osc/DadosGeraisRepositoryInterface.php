<?php


namespace App\Repositories\Osc;


use App\Models\Osc\DadosGerais;
use Illuminate\Database\Eloquent\Model;

interface DadosGeraisRepositoryInterface
{
    public function __construct(DadosGerais $__dados_gerais);

    public function getAll();

    public function get($id);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}