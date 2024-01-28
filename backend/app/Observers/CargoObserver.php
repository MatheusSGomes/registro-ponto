<?php

namespace App\Observers;

use App\Models\Cargo;
use Ramsey\Uuid\Uuid;

class CargoObserver
{
    /**
     * Handle the Cargo "created" event.
     */
    public function created(Cargo $cargo): void
    {
        $cargo->id = Uuid::uuid4();
    }

    /**
     * Handle the Cargo "updated" event.
     */
    public function updated(Cargo $cargo): void
    {
        //
    }

    /**
     * Handle the Cargo "deleted" event.
     */
    public function deleted(Cargo $cargo): void
    {
        //
    }

    /**
     * Handle the Cargo "restored" event.
     */
    public function restored(Cargo $cargo): void
    {
        //
    }

    /**
     * Handle the Cargo "force deleted" event.
     */
    public function forceDeleted(Cargo $cargo): void
    {
        //
    }
}
