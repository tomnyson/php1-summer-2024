<?php

namespace Core;

class App
{
    protected $controller = 'App\\Controllers\\HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Debugging lines
        echo '<pre>';
        echo "Parsed URL:\n";
        print_r($url);
        echo '</pre>';

        if (!empty($url)) {
            $potentialController = 'App\\Controllers\\' . ucfirst($url[0]) . 'Controller';
            var_dump($potentialController);
            echo "Potential Controller: $potentialController\n";
            if (class_exists($potentialController)) {
                echo "Potential Controller 31313: $potentialController\n";
                $this->controller = $potentialController;
                unset($url[0]);
            } else {
                echo "not existing: $potentialController\n";
            }
        }

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        // Debugging parameters
        echo '<pre>';
        echo "Controller: " . get_class($this->controller) . "\n";
        echo "Method: " . $this->method . "\n";
        echo "Parameters:\n";
        var_dump($this->params);
        echo '</pre>';

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = str_replace('/php1-summer-2024/ca1/mvc/public', '', $url); // Adjust this part based on your project structure
            $urlArray = explode('/', $url);
            $urlArray = array_filter($urlArray); // Remove empty values
            return array_values($urlArray); // Reindex the array
        }
        return [];
    }
}
