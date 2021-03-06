<?php

namespace App\Jobs;

use App\Mail\RegisteredEventConfirm;
use App\User;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class RegisteredEventConfirmEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;
    protected $user;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new RegisteredEventConfirm($this->event, $this->user));
    }
}
