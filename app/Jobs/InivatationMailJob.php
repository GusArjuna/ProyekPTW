<?php

namespace App\Jobs;

use App\Mail\InviteNotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InivatationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $meeting;
    protected $attendences;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $meeting, $attendences = null)
    {
        $this->email = $email;
        $this->meeting = $meeting;
        $this->attendences = $attendences;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->email)->send(new InviteNotificationMail($this->meeting, $this->attendences));
        } catch (\Exception $e) {
            $this->failed($e);
        }
    }

    public function failed($exception)
    {
        Log::error('[job_invitation_zoom] => ' . $exception);
    }
}
