<?php

namespace App\Models;

use App\Models\Consulta;
use App\Models\Procedimento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultaProcedimento extends Model
{
    use HasFactory;

    protected $table = 'consulta_procedimento';

    protected $primaryKey = 'cp_codigo';

    protected $fillable = ['cons_codigo', 'proc_codigo'];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function procedimento()
    {
        return $this->belongsTo(Procedimento::class);
    }
}
