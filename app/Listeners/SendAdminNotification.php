<?php

namespace App\Listeners;

use App\Events\AdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendAdminNotification
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
    public function handle(AdminNotification $event): void
    {
        try {
            $webhookUrl = config('services.discord.register_webhook');

            if (!$webhookUrl) {
                return;
            }

            $payload = [
                'content' => $event->message,
                'username' => 'fraud.cool | notification',
            ];

            Http::post($webhookUrl, $payload);
        } catch (\Exception $e) {
            Log::error('Failed to send registration notification to Discord: ' . $e->getMessage());
        }
    }
}
