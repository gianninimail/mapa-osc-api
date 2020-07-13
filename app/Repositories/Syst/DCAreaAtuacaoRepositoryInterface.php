<?php


namespace App\Repositories\Syst;


use App\Models\Syst\DCAreaAtuacao;
use Illuminate\Database\Eloquent\Model;

interface DCAreaAtuacaoRepositoryInterface
{
    public function __construct(DCAreaAtuacao $_modelo);

    public function getAll();

    public function get($_id);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}