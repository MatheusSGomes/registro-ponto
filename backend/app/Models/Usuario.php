<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at'
    ];
    protected $fillable = [
        'nome',
        'email',
        'tipousuario_id',
        'password',
    ];
}
