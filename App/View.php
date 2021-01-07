<?php


namespace App;



class View
{

    protected $data = [];


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
        include $template;
        $content= ob_get_contents();
        ob_end_clean();
        return  $content;

    }

    public function display($template)
    {
        echo $this->render($template);
    }

}