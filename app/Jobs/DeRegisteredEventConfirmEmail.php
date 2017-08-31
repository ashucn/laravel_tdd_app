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
use App\Mail\DeRegisteredEventConfirm;

class DeRegisteredEventConfirmEmail implements ShouldQueue
{
    protected $event;
    protected $user;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

        Mail::to($this->user)->send(new DeRegisteredEventConfirm($this->event, $this->user));
    }
}
