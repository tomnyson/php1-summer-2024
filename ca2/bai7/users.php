<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * username, password, role, email, name 
 * constructor
 * login  => username, password,
 * in user
 *  get, set
 */
class User
{
    public $username;
    public $password;
    public $role;
    public $email;
    public $name;

    function __construct($username, $password, $role, $email, $name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->email = $email;
        $this->name = $name;
    }

    function getUser()
    {
        echo "________________________________________________________________" . "<br/>";
        echo "Username: " . $this->username . "<br/>";
        echo "Password: " . $this->password . "<br/>";
        echo "Role: " . $this->role . "<br/>";
        echo "Email: " . $this->email . "<br/>";
        echo "Name: " . $this->name . "</br>";
    }
    function login($username, $password)
    {
        if ($this->username == $username && $this->password == $password) {
            echo "dang nhap thanh cong";
            return true;
        } else {
            echo "dang nhap that bai";
            return false;
        }
    }
}
$user = new User("admin", "123456", "admin", "email13@gmail.com", "Minh");
$user->getUser();
// 
$user->login('admin', '123456');
