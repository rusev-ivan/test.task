<?php

namespace App\Controllers;

use App\View;

class Index
{

    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke()
    {
        $this->view->display('index.php');
    }
}