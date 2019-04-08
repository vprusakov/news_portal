<?php

require APP . 'view/_components/Nav.php';

class ManagerController
{
    private $Nav = null;

    public function __construct() {
        $this->Nav = new Nav();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';

        echo $this->Nav->createNav('/manager');

        require APP . 'view/manager/index.php';
        
        require APP . 'view/_templates/footer.php';
    }
}