<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailtrap extends Mailable
{
    use Queueable, SerializesModels;
    public $myUrl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        //
        $this->myUrl =$url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('from@example.com', 'Timsmek-Publishing')
            ->subject('Payment Confirmation')
            ->markdown('pages.mail')
            ->with([
                'name' => 'New Mailtrap User',
                'link' => 'https://mailtrap.io/inboxes'
            ]);
        return $this->view('view.name');
    }
}
