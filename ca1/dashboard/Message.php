<?php
class Message
{
    public  $message;
    public $type;
    public function __construct()
    {
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            $this->message = $_SESSION['message']['message'];
            $this->type = $_SESSION['message']['type'];
        }
    }

    public function setMessage($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $_SESSION['message'] = array('message' => $message, 'type' => $type);
    }

    public function displayMessage()
    {
        if (!empty($this->message)) {
            $class = $this->type === 'success' ? 'success' : 'danger';
            echo "<div class='alert alert-$class' role='alert'>
            $this->message
                </div>";
        }
    }
}
