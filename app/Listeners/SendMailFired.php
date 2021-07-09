<?php

namespace App\Listeners;
use App\Events\SendMail;
use App\Mail\HaryGaryBestMailEver;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
class SendMailFired
{
    public function __construct()
    {

    }
    public function handle(SendMail $event)
    {
        $details = [
            'title' => 'Mail from YOUR THICK MOM',
            'body' => 'Your account details have been changed'
        ];

        \Mail::to($event->userId->email)->send(new HaryGaryBestMailEver($details));
    }
}
