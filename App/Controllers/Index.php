<?php

namespace App\Controllers;

use App\View;

class Index
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function __invoke()
    {
        $this->view->display('index.php');
    }
}