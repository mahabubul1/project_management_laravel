<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $params = [];
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDetails, ... $params)
    {
        $this->user = $userDetails;
        if( !empty($params) ) {
            foreach ($params as $key => $value) {
                $this->params[$key] = $value;
                if(array_key_exists('password', $value)) {
                    $this->password = $value['password'];
                }
            }
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("maab.career@gmail.com","MAAB")
                ->subject("Verify Account")
                ->view('admin.email.sendUserDetails');
    }
}
