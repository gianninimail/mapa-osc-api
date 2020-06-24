<?php


namespace App\Repositories\Osc;

use App\Models\Osc\Osc;
use App\Repositories\Osc\OscRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OscRepositoryEloquent implements OscRepositoryInterface
{
    private $model;

    public function __construct(Osc $_osc)
    {
        $this->model = $_osc;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        $osc = $this->model->find($id);

        return $osc;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}