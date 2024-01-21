<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'colaborador_id',

        'seg_p1_entrada',
		'seg_p1_saida',
		'seg_p2_entrada',
		'seg_p2_saida',

		'ter_p1_entrada',
		'ter_p1_saida',
		'ter_p2_entrada',
		'ter_p2_saida',

		'qua_p1_entrada',
		'qua_p1_saida',
		'qua_p2_entrada',
		'qua_p2_saida',

		'qui_p1_entrada',
		'qui_p1_saida',
		'qui_p2_entrada',
		'qui_p2_saida',

		'sex_p1_entrada',
		'sex_p1_saida',
		'sex_p2_entrada',
		'sex_p2_saida',

		'sab_p1_entrada',
		'sab_p1_saida',
		'sab_p2_entrada',
		'sab_p2_saida',

		'dom_p1_entrada',
		'dom_p1_saida',
		'dom_p2_entrada',
		'dom_p2_saida',
    ];
}
