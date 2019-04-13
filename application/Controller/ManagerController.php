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
    
    public function delete($id) {
        $this->News->deleteNewsEntryById($id);
        header('location: ' . URL . 'manager');
    }

    public function save() {
        $_POST = json_decode(file_get_contents("php://input"), true);
        $this->News->addNewsEntry($_POST['headline'], $_POST['intro'], $_POST['content']);
    }

    public function edit($id = -1) {

        require APP . 'view/_templates/header.php';

        echo $this->Nav->createNav('/manager/edit');

        $news_entry = null;

        if ($id !== -1) {
            $news_entry = $this->News->getNewsEntryById($id)[0];
        } else {
            $news_entry = new stdClass();
            $news_entry->id = -1;
            $news_entry->headline = 'Заголовок';
            $news_entry->intro = '<p>Вступление</p>';
            $news_entry->content = '<p>Текст</p>';
        }

        require APP . 'view/manager/edit.php';
        
        require APP . 'view/_templates/footer.php';
    }

    public function update($id = -1) {   
        $_POST = json_decode(file_get_contents("php://input"), true);
        if ($id == -1) {
            echo $_POST['headline'];
            $this->News->addNewsEntry($_POST['headline'], $_POST['intro'], $_POST['content']); 
        } else {
            $this->News->updateNewsEntryById($id, $_POST['headline'], $_POST['intro'], $_POST['content']);
        }
    }
}