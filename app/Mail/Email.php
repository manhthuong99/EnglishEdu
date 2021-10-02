<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;


    public $data;
    public $type;

    public function __construct($data, $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['data'] = $this->data;
        switch ($this->type){
            case 'forgot_password':
            {
                return $this->view('mail.forgot_password',$data);
            }
            case 'approve_center':
            {
                return $this->view('mail.approve_center',$data);
            }
            case 'consulting':
                return $this->view('mail.consulting',$data);
        }

    }
}
