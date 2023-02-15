<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    //code by ryo

    private $data =[];
    //end of code

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($data)
    // {
    //     $this->data = $data;
    // }

    public function __construct($data, $key)
    {
        $this->data = $data;
        $this->key = $key;
    }

    public function build()
    {


        return $this->from('kepompongacademy@gmail.com','Kepompong Academy')
            ->view('emails.index')->with('data',$this->data)->with('key', $this->key);


    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Kepompong Password Reset',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
        // view: 'view.name',
            view: 'emails.index',
        );
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
