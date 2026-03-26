<?php

namespace App\Observers;

use App\Models\Place;

class PlaceObserver
{
    /**
     * Handle the Place "created" event.
     */
    public function creating(Place $place): void
    {
        $place->created_by = auth()->id();
    }

    /**
     * Handle the Place "updated" event.
     */
    public function updated(Place $place): void
    {
        //
    }

    /**
     * Handle the Place "deleted" event.
     */
    public function deleted(Place $place): void
    {
        //
    }

    /**
     * Handle the Place "restored" event.
     */
    public function restored(Place $place): void
    {
        //
    }

    /**
     * Handle the Place "force deleted" event.
     */
    public function forceDeleted(Place $place): void
    {
        //
    }
}
