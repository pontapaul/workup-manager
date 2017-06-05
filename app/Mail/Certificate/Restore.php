<?php

namespace App\Mail\Certificate;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Site;

class Restore extends Mailable
{
    use Queueable, SerializesModels;

    protected $side;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Site $site)
     {
         $this->site = $site;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.check.certificate.restore')
                    ->subject('SSL of ' . $this->site->url . ' is back online')
                    ->with('site', $this->site);
    }
}
