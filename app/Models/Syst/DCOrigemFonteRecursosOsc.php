<?php

namespace App\Models\Syst;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cd_origem_fonte_recursos_osc
 * @property string $tx_nome_origem_fonte_recursos_osc
 * @property Syst.dcFonteRecursosOsc[] $syst.dcFonteRecursosOscs
 */
class DCOrigemFonteRecursosOsc extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'syst.dc_origem_fonte_recursos_osc';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cd_origem_fonte_recursos_osc';

    /**
     * @var array
     */
    protected $fillable = ['tx_nome_origem_fonte_recursos_osc'];

}
