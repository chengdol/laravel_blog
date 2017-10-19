<?php

namespace App\Listeners;

use App\Events\ContactMessageReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
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
     * @param  ContactMessageReceived  $event
     * @return void
     */
    public function handle(ContactMessageReceived $event)
    {
        $contact_message = $event->contact_message;

        // use Illuminate\Support\Facades\Mail;
        Mail::send('email.contact-message-notification', ['contact_message' => $contact_message]
            , function($m) use($contact_message) {
                $m->from('chengdol@blog.com');
                $m->to('hhgjlcd@gmail.com', "chengdol");
                $m->subject('new message');
            });
    }
}
