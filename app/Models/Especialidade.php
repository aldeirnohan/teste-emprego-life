<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'especialidade';

    protected $primaryKey = 'espec_codigo';

    protected $fillable = ['espec_nome'];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
