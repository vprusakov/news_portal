<?php

require APP . "Model/News.php";
require APP . 'view/_components/Nav.php';

class HomeController
{
    private $Nav = null;
    private $News = null;

    public function __construct() {
        $this->News = new News();
        $this->Nav = new Nav();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';

        echo $this->Nav->createNav('/');

        $news = $this->News->getAllNews();
        require APP . 'view/home/index.php';

        require APP . 'view/_templates/footer.php';
    }

    public function read($id) {
        require APP . 'view/_templates/header.php';

        echo $this->Nav->createNav('/read');

        $news_entry = $this->News->getNewsEntryById($id)[0];
        require APP . 'view/home/read.php';

        require APP . 'view/_templates/footer.php';
    }
}