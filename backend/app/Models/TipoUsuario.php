<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class TipoUsuario extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;
    protected $table = 'tipo_usuarios';
    protected $fillable = ['titulo'];

    protected static function booted()
    {
        static::creating(fn (TipoUsuario $tipoUsuario) => $tipoUsuario->id = (string) Uuid::uuid4());
    }
}
