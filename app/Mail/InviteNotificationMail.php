<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = json_decode($this->meeting->details);
        $datetime = date('Y-m-d H:i:s', strtotime($date->start_time));
        return $this->markdown('emails.invitationMail')->with(['meeting' => $this->meeting, 'datetime' => $datetime]);
    }
}
