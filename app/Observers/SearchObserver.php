<?php

namespace App\Observers;

use App\Models\History;

class SearchObserver
{
    /**
     * Handle the Search "created" event.
     */
    public function created(History $search): void
    {
    }

    /**
     * Handle the Search "updated" event.
     */
    public function updated(History $search): void
    {
        //
    }

    /**
     * Handle the Search "deleted" event.
     */
    public function deleted(History $search): void
    {
        //
    }

    /**
     * Handle the Search "restored" event.
     */
    public function restored(History $search): void
    {
        //
    }

    /**
     * Handle the Search "force deleted" event.
     */
    public function forceDeleted(Search $search): void
    {
        //
    }
}
