<?php
class App
{
    protected $controller = "Dashboard";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {

        $url = $this->parseUrl();
        if (isset($url[0])) {
            if (file_exists('../App/Controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($this->url[0]);
            }
        }

        require_once '../App/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($this->url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);


        // $this->controller = $this->setController($url[0]);
        // require_once '../App/Controllers/' . $this->controller . '.php';
        // $this->controller = new $this->controller();
        // $this->setMethod($url[1]);
        // // var_dump($this->method);
        // // die();
        // $this->setParam($url);
        // $this->execApp();
    }

    public function parseURL()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"]);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function setController($controller)
    {
        // if (isset($controller)) {
        //     if (file_exists('../App/Controllers/' . $controller . '.php')) {
        //         $this->controller = $controller;
        //         unset($this->url[0]);
        //     } else {
        //         return $this->controller;
        //     }
        // } else {
        //     return $this->controller;
        // }
    }

    public function setMethod($method)
    {
        // if (isset($method)) {
        //     if (method_exists($this->controller, $method)) {
        //         $this->method = $method;
        //         unset($this->url[1]);
        //     }
        // }
    }

    public function setParam($url)
    {
        // if (!empty($url)) {
        //     $this->params = array_values($url);
        // }
    }

    public function execApp()
    {
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
