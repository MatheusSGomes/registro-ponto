<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Feriado extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['data', 'descricao'];
    protected $hidden = ['created_at', 'updated_at'];
}
