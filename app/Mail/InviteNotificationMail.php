<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $meeting;
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
        return $this->view('emails.new_blog')
                    ->subject('this is test email subject')  //<= how to pass variable on this subject
                    ->with([
                        'title'     => $this->blog->title, //this works without queue
                        'content'     => $this->blog->title, //this works without queue
                    ]);
        }
    }
}
