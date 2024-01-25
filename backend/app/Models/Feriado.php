<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    use HasFactory;
    protected $fillable = ['data', 'descricao'];
    protected $hidden = ['created_at', 'updated_at'];
}
