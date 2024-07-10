<?php

namespace App\Models;

use App\Models\Paciente;
use App\Models\PacientePlanoSaude;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanoSaude extends Model
{
    use HasFactory;

    protected $table = 'plano_saude';

    protected $primaryKey = 'plano_codigo';

    protected $fillable = ['plano_descricao', 'plano_telefone'];

    public function pacientes()
    {
        return $this->hasManyThrough(Paciente::class, PacientePlanoSaude::class, 'pac_codigo', 'pac_codigo', 'plano_codigo', 'pps_codigo');
    }

}
