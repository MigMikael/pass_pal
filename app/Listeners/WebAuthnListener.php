<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laragear\WebAuthn\Events\CredentialCreated;

class WebAuthnListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CredentialCreated $event): void
    {
        $registerdUserId = $event->user->id;
        $user = User::find($registerdUserId);
        $user->registered_passkey = true;
        $user->save();
    }
}
