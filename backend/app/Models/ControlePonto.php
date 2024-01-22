<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ControlePonto extends Model
{
    use HasFactory;
    protected $table = 'controle_pontos';
    public $timestamps = false;
    protected $fillable = [
        'colaborador_id',
        'data',
        'horario',
        'latitude',
        'longitude',
    ];

    public function colaborador(): HasOne
    {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }
}
