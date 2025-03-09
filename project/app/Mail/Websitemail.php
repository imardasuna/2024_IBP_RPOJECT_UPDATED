<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$body)
    {
        $this->subject = $subject;
        $this->body = $body;

    }
    public function build()
    {
        return $this->view('admin.email.email')->with([
            'subject' =>$this->subject
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
