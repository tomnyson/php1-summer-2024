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
        print_r($url);
        echo '</pre>';

        if (isset($url[0])) {
            $potentialController = 'App\\Controllers\\' . ucfirst($url[0]) . 'Controller';
            if (class_exists($potentialController)) {
                $this->controller = $potentialController;
                unset($url[0]);
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
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
