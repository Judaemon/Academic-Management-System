<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Announcement;

class AnnouncementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $announcement;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $announcement)
    {
        $this->user = $user;
        $this->announcement = $announcement;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->announcement->title,
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
            markdown: 'emails.announcement',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        if(!empty($this->announcement->main_image)) {
            return "HELLO";
        } else {
            return [];
        }
    
    }
}
