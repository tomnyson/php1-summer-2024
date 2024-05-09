<?php

namespace Admin;

class User
{
    public $username;
    public $password;
    public $email;
    public $role;
    public $status;

    function __construct($username, $password, $email, $role, $status)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->status = $status;
    }
    public function xuatThongTin()
    {
        print("username: $this->username <hr/>");
        print("password: $this->password");
    }
    public function dangnhap($username, $password)
    {
        if ($username == 'admin' && $password == '123456') {
            print('dang nhap thanh cong');
            return true;
        }
        print('dang nhap thanh failed');
        return false;
    }

    public function __destruct()
    {
        print('<h1>will destroy</h1>');
    }
}