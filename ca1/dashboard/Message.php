<?php

class Message
{
    public  $message;
    public $type;
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }
    public function setMessage($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function displayMessage()
    {
    }
}
