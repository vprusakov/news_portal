<?php

require APP . "Model/News.php";

class HomeController
{
    private $News = null;

    public function __construct() {
        $this->News = new News();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_components/nav.php';
        echo createNav('/');

        $news = $this->News->getAllNews();
        require APP . 'view/home/index.php';

        require APP . 'view/_templates/footer.php';
    }

    public function read($id) {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_components/nav.php';
        echo createNav('/manager');

        $news_entry = $this->News->getNewsEntryById($id)[0];
        require APP . 'view/home/read.php';

        require APP . 'view/_templates/footer.php';
    }
}