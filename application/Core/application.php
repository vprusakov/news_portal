<?php

class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

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

            if (method_exists($controller, $this->url_action)) {
                if (!empty($this->url_params)) {
                    call_user_func_array(array($controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                $controller->index();
            }
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = explode('/', $url);
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;
            unset($url[0], $url[1]);
            $this->url_params = array_values($url);
        }
    }
}