<?php

class UserController extends Controller {

    public function liste(){
        $user = new User();
        $users = $user->get_all();
        $this->set(['users'=>$users]);
        $this->render('liste');
    }

    public function _new(){
        $this->render('new');
    }

    public function ajouter(){
        $user = new User();
        $user->name = $_POST['name'];
        $user->create();
        header('Location:'.ROOT.'user/liste');
    }

    public function supprimer(){
        $id = $_GET['id'];
        $user = new User($id);
        $user->delete();
        header('Location:'.ROOT.'user/liste');
    }

    public function detail(){
        $id = (int)$_GET['id'];
        $user = new User($id);
        $ticket = new Ticket();
        $ticket->id_user = $id;
        $tickets = $ticket->get_all_user();
        $this->set(['user'=>$user, 'tickets'=>$tickets]);
        $this->render('detail');
    }

}