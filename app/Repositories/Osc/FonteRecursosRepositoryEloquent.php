<?php


namespace App\Repositories\Osc;

use App\Models\Osc\FonteRecursos;
use App\Repositories\Osc\FonteRecursosRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FonteRecursosRepositoryEloquent implements FonteRecursosRepositoryInterface
{
    private $model;

    public function __construct(FonteRecursos $_fonte_recursos)
    {
        $this->model = $_fonte_recursos;
    }

    public function getFonteRecursosPorOSC($_id_osc)
    {
        $fonte_recursos = $this->model->where('id_osc', $_id_osc)->with('dc_fonte_recursos.dc_origem_fonte_recurso')->get();

        return $fonte_recursos;
    }

    public function getAnoFonteRecursosPorOSC($_id_osc, $_ano)
    {
    //$anos_fonte_recursos = $this->model->where('id_osc', $_id_osc)->groupBy('id_osc','dt_ano_recursos_osc')->get(['id_osc', 'dt_ano_recursos_osc']);
    //$fonte_recursosfonte_recursos = $this->model->where('id_osc', $_id_osc)->get();
    //$anos_fonte_recursos = $fonte_recursosfonte_recursos->where('dt_ano_recurso_osc', $_ano)->get();
    //$str = 'to_char(dt_ano_recursos_osc, ''YYYY'')';
    //$anos_fonte_recursos = $this->model->where('id_osc', $_id_osc)->where('to_char(dt_ano_recursos_osc, ''YYYY'')', $_ano)->get();
    //$anos_fonte_recursos = $this->model->where('id_osc', $_id_osc)->get();
  
//    $anos_fonte_recursos = $this->model->where('id_osc', $_id_osc)->where('tochar(dt_ano_recursos_osc, YYYY)', $_ano)->get();
    $anos_fonte_recursos = $this->model->where('id_osc', $_id_osc)->where($this->model->to_char('dt_ano_recursos_osc','YYYY'), $_ano)->get();

/*
        foreach ($anos_fonte_recursos as $item)
        {
            $item->dt_ano_recursos_osc = substr($item->dt_ano_recursos_osc, 0, -6);
        }
*/
        return $anos_fonte_recursos;
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