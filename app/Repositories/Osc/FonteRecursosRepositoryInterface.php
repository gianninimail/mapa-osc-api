<?php


namespace App\Repositories\Osc;


use App\Models\Osc\FonteRecursos;
use Illuminate\Database\Eloquent\Model;

interface FonteRecursosRepositoryInterface
{
    public function __construct(FonteRecursos $_fonte_recursos);

    public function getFonteRecursosPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}