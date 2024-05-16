<?php
// controllers/HomeController.php

namespace Controllers;

use Models\UserModel;

class HomeController
{
    public function index($translations)
    {
        // Create an instance of the model
        $userModel = new UserModel();

        // Get data from the model
        $users = $userModel->getUsers();

        // Pass data and translations to the view
        require 'views/home.php';
    }
}
