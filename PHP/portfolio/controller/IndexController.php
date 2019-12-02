<?php

class IndexController extends Controller {

    public function page (){
        $this->render('vide');
    }

    public function background(){

        $config = new Config();
        $this->set(['nom'=>Config::get('nom'),
                    'prenom'=>Config::get('prenom')]);
        $this->render('background');

    }
}