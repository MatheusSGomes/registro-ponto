<?php

namespace App\Observers;

use App\Models\Funcao;
use Ramsey\Uuid\Uuid;

class FuncaoObserver
{
    /**
     * Handle the Funcao "created" event.
     */
    public function created(Funcao $funcao): void
    {
        $funcao->id = Uuid::uuid4();
    }

    /**
     * Handle the Funcao "updated" event.
     */
    public function updated(Funcao $funcao): void
    {
        //
    }

    /**
     * Handle the Funcao "deleted" event.
     */
    public function deleted(Funcao $funcao): void
    {
        //
    }

    /**
     * Handle the Funcao "restored" event.
     */
    public function restored(Funcao $funcao): void
    {
        //
    }

    /**
     * Handle the Funcao "force deleted" event.
     */
    public function forceDeleted(Funcao $funcao): void
    {
        //
    }
}
