<?php

class ResponseController extends Controller {

    public function ajouter(){
        $response = new Response();
        $response->id_user = $_POST['id_user'];
        $response->id_ticket = $_POST['id_ticket'];
        $response->content = $_POST['content'];
        $response->create();
        header('Location:'.ROOT.'ticket/detail?id='.$_POST['id_ticket']);
    }
}