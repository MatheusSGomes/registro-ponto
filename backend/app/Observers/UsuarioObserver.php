<?php

namespace App\Observers;

use App\Models\Usuario;
use Ramsey\Uuid\Uuid;

class UsuarioObserver
{
    /**
     * Handle the Usuario "created" event.
     */
    public function created(Usuario $usuario): void
    {
        // causando erro 404
        //$usuario->id = Uuid::uuid4();
    }

    /**
     * Handle the Usuario "updated" event.
     */
    public function updated(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "deleted" event.
     */
    public function deleted(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "restored" event.
     */
    public function restored(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     */
    public function forceDeleted(Usuario $usuario): void
    {
        //
    }
}
