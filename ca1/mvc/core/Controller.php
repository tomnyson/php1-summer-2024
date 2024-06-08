<?php

namespace Core;

class Controller
{
    public function model($model)
    {

        echo "call model";
        var_dump($model);
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        echo "call view";
        var_dump($view);
        require_once '../app/views/' . $view . '.php';
    }
}
