<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class SendRegistrationNotification
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
    public function handle(Registered $event): void
    {
        try {
            $webhookUrl = config('services.discord.register_webhook');

            if (!$webhookUrl) {
                return;
            }

            $payload = [
                'content' => "New user registered: {$event->user->name}, {$event->user->email}",
                'username' => 'fraud.cool | notification',
            ];

            Http::post($webhookUrl, $payload);
        } catch (\Exception $e) {
            Log::error('Failed to send registration notification to Discord: ' . $e->getMessage());
        }
    }
}
