<?php


namespace App\Repositories\Osc;


use App\Models\Osc\Projeto;
use Illuminate\Database\Eloquent\Model;

interface ProjetoRepositoryInterface
{
    public function __construct(Projeto $_projeto);

    public function getAll();

    public function get($id);

    public function getFormatado($id);

    public function getProjetosPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}