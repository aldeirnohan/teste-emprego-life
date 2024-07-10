<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';

    protected $primaryKey = 'pac_codigo';

    protected $fillable = [
        'pac_nome',
        'pac_dataNascimento',
        'pac_telefones'
    ];

    protected $casts = [
        'pac_telefones' => 'array',
    ];

    public function planoSaudes()
    {
        return $this->hasManyThrough(PlanoSaude::class, PacientePlanoSaude::class, 'pac_codigo', 'plano_codigo', 'pac_codigo', 'plano_codigo');
    }

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class);
    }
}
