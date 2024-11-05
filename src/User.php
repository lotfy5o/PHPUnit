<?php

class User
{
    public $first_name;
    public $surname;

    public $email;

    protected $mailer;

    public function get_full_name()
    {
        return trim("$this->first_name $this->surname");
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    // I could use the constructor
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
