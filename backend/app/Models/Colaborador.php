<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
