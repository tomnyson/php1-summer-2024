<?php
// models/UserModel.php

namespace Models;

class UserModel
{
    public function getUsers()
    {
        // Hard-coded data for simplicity
        return [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com']
        ];
    }
}
