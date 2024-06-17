<?php
// app/Mail/ConsultationMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mailer\Envelope;

class ConsultationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('emails.consultation')
//            ->subject('New Consultation Request');

        return $this->from('andrii.rsh@gmail.com', config('app.name'))
            ->subject('Subject of the email')
            ->view('emails.consultation');
    }

}
