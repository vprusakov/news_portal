<?php

class Application
{
    private $url_controller = null;

    public function __construct()
    {
        $this->splitUrl();

        if (!$this->url_controller) {
            require APP . 'Controller/HomeController.php';
            $page = new HomeController();
            $page->index();
        } else {
            require APP . 'Controller/' . ucfirst($this->url_controller) . 'Controller.php';
            $controller_name = ucfirst($this->url_controller) . 'Controller';
            $controller = new $controller_name();
            $controller->index();
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = explode('/', $url);
            $this->url_controller = isset($url[0]) ? $url[0] : null;
        }
    }
}