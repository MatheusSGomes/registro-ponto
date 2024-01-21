<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlePonto extends Model
{
    use HasFactory;
    protected $table = 'controle_pontos';
    public $timestamps = false;
    protected $fillable = [
        'colaborador_id',
        'data',
        'horario',
        'localizacao',
    ];
}
