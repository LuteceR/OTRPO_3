<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckCardDeletionRights
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CardDeleting $event)
    {
        $user = Auth::user();

        if (!($user->is_admin || $event->card->user_id === $user->id)) {
            abort(403, 'Нет прав на удаление');
        }
    }
}
