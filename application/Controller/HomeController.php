<?php

require APP . "Model/News.php";

class HomeController
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        
        require APP . 'view/_components/nav.php';
        echo createNav('/');

        $News = new News();
        $news = $News->getAllNews();
        require APP . 'view/home/index.php';

        require APP . 'view/_templates/footer.php';
    }
}