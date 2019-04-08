<?php

require APP . 'view/_components/Nav.php';
require APP . "Model/News.php";

class ManagerController
{
    private $Nav = null;
    private $News = null;

    public function __construct() {
        $this->Nav = new Nav();
        $this->News = new News();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';

        echo $this->Nav->createNav('/manager');

        $news = $this->News->getAllNews();
        require APP . 'view/manager/index.php';
        
        require APP . 'view/_templates/footer.php';
    }

}