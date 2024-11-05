<?php

class Mailer
{

    public function sendMessage($email, $message)
    {

        sleep(3);

        echo "send '$message' to $email\n";

        return true;
    }
}
