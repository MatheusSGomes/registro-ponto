<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = 'colaboradores';
    protected $fillable = [
        'cpf',
        'ativo',
        'nome',
        'data_nascimento',
        'data_admissao',
        'email',
        'cargo_id',
        'funcao_id',
        'data_recisao',
        'usuario',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    //protected $with = ['horarios'];

    public function horarios(): HasOne
    {
        return $this->hasOne(Horario::class);
    }

    public function setCpfAttribute($value)
    {
        if ($value) {
            $this->attributes['cpf'] = preg_replace('/\D/','${1}', $value);
        }
    }
}
