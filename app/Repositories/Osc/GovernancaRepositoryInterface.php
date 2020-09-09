<?php


namespace App\Repositories\Osc;


use App\Models\Osc\Governanca;
use Illuminate\Database\Eloquent\Model;

interface GovernancaRepositoryInterface
{
    public function __construct(Governanca $_governanca);

    public function get($id);

    public function getGovernancaPorOSC($_id_osc);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}