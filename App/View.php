<?php

namespace App;

class View
{

    protected $data = [];
    protected $dirTemplates;

    public function __construct()
    {
        $this->dirTemplates = __DIR__ . '/../templates/';
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name)
    {
        return $this->data[$name];
    }

    public function render($template)
    {
        ob_start();
        include $this->dirTemplates .  $template;
        $content= ob_get_contents();
        ob_end_clean();
        return  $content;

    }

    public function display($template)
    {
        echo $this->render($template);
    }

}