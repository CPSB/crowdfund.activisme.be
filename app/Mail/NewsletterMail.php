<?php

namespace ActivismeBE\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class NewsletterMail
 *
 * @package ActivismeBE\Mail
 */
class NewsletterMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $update; /** @var $update */
    public $user;   /** @var $user   */

    /**
     * Create a new message instance.
     *
     * @param  $update
     * @param  $user
     * @return void
     */
    public function __construct($update, $user)
    {
        $this->update = $update;
        $this->user   = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('updates.email.nieuwsbrief')
            ->subject('Nieuwsbrief: ' . $this->update->title);
    }
}
