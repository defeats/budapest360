<?php

namespace App\Observers;

use App\Models\Place;
use Illuminate\Support\Str;

class PlaceObserver
{
    /**
     * Handle the Place "created" event.
     */
    public function creating(Place $place): void
    {
        $place->created_by = auth()->id();
        $place->slug = Str::slug($place->name);
    }

    /**
     * Handle the Place "updated" event.
     */
    public function updating(Place $place): void
    {
        if ($place->isDirty('name')) {
            $place->slug = Str::slug($place->name);
        }
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
