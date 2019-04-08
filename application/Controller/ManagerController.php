<?php

class ManagerController
{
    public function index()
    {
        require APP . 'view/_templates/header.php';

        require APP . 'view/_components/nav.php';
        echo createNav('/manager');

        require APP . 'view/manager/index.php';
        
        require APP . 'view/_templates/footer.php';
    }
}