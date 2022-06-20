<?php

namespace App\Controllers;

class MainController
{

    public function index()
    {

        $this->render('home', []);
    }

    public function render($viewName, $parameters = [])
    {
        require('src/Views/' . $viewName . '.tpl.php');
    }
}
