<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Colaborador extends Model
{
    use HasFactory, HasUuids;
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
    protected $casts = [
        'ativo' => 'boolean',
        'data_nascimento' => 'datetime:Y-m-d',
        'data_admissao' => 'datetime:Y-m-d',
        'data_recisao' => 'datetime:Y-m-d',
    ];
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

    //public function setDataNascimentoAttribute($value)
    //{
    //    if ($value) {
    //        if ($value instanceof Carbon) {
    //            $this->attributes['data_nascimento'] = $value->format('Y-m-d');
    //        } else {
    //            $this->attributes['data_nascimento'] = Carbon($value);
    //        }
    //    }
    //}
}
