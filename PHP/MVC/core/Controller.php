<?php

class Controller{
    public $vars = [];

    public function set($vars){
        $this->vars = array_merge($this->vars, $vars);
    }

    public function render($view){
        $controller = lcfirst(explode('C',get_class($this))[0]);
        extract($this->vars);
        if(file_exists('controller/'.get_class($this).'.php'))
            include './view/' .$controller . '/'.$view .'.php';
        else
            die('Le fichier '.$controller.'.php'.' n\'existe pas');

    }
}