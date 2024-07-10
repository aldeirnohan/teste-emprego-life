<?php

namespace App\Models;

use App\Models\Paciente;
use App\Models\PlanoSaude;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PacientePlanoSaude extends Model
{
    use HasFactory;

    protected $table = 'paciente_plano_saude';

    protected $primaryKey = 'pps_codigo';

    protected $fillable = ['pps_nrContrato', 'pac_codigo', 'plano_codigo'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function planoSaude()
    {
        return $this->belongsTo(PlanoSaude::class);
    }
}
