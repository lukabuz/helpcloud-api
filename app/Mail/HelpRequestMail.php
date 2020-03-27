<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\HelpRequest;

class HelpRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $helpRequest;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HelpRequest $helpRequest)
    {
        $this->helpRequest = $helpRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('help')->subject($this->helpRequest->name . ' is Requesting Your Help on HelpCloud');
    }
}
