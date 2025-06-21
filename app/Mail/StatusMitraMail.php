<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusMitraMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mitra;

    public function __construct($mitra)
    {
        $this->mitra = $mitra;
    }

    public function build()
    {
        return $this->subject('Status Pendaftaran Mitra Anda')
                    ->view('emails.status_mitra')
                    ->with([
                        'mitra' => $this->mitra,
                    ]);
    }
}
