<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medico';

    protected $primaryKey = 'med_codigo';

    protected $fillable = ['med_nome', 'med_crm', 'espec_codigo'];

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'espec_codigo');
    }
}
