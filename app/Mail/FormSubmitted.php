<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $dateStart;
    public $dateEnd;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $dateStart, $dateEnd, $email)
    {
        $this->company = $company;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->email)
            ->subject($this->company)
            ->view('Mail/formSubmitted');
    }
}
