<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;
use App\User;

class RegisteredEventConfirm extends Mailable
{
    protected $event;
    protected $user;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, User $user)
    {
        //
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.reg-event-confirm')
            ->with('user', $this->user)
            ->with('event', $this->event);
    }
}
