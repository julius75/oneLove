<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RejectStageOne extends Mailable
{
    use Queueable, SerializesModels;
    public $ones;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ones)
    {
        //
        $this->ones=$ones;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reject_stage_one');
    }
}
