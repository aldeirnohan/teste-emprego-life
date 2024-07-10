<?php

namespace App\Models;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Procedimento;
use App\Models\PacientePlanoSaude;
use App\Models\ConsultaProcedimento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';

    protected $primaryKey = 'cons_codigo';

    protected $fillable = ['cons_data', 'cons_hora', 'cons_particular', 'pac_codigo', 'med_codigo', 'pps_codigo', 'proc_codigo', 'cp_codigo'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'pac_codigo');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'med_codigo');
    }

    public function pacientePlanoSaude()
    {
        return $this->belongsTo(PacientePlanoSaude::class, 'pps_codigo');
    }

    public function procedimentos()
    {
        return $this->hasManyThrough(Procedimento::class, ConsultaProcedimento::class, 'cons_codigo', 'proc_codigo', 'cons_codigo', 'proc_codigo');
    }
}
