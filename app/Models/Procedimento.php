<?php

namespace App\Models;

use App\Models\Consulta;
use App\Models\ConsultaProcedimento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procedimento extends Model
{
    use HasFactory;

    protected $table = 'procedimento';

    protected $primaryKey = 'proc_codigo';

    protected $fillable = ['proc_nome', 'proc_valor', 'cons_codigo', 'cp_codigo'];

    public function consultas()
    {
        return $this->hasManyThrough(Consulta::class, ConsultaProcedimento::class, 'proc_codigo', 'cons_codigo', 'proc_codigo', 'cons_codigo');
    }
}
