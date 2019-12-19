<?php

class LivreController extends Controller{

    public function liste(){
        $livre = new Livre();
        $livres = $livre->get_all();
        $this->set(['livres'=>$livres]);
        $this->render('liste');
    }

    public function detail(){
        $id = (int)$_GET['id'];

        $livre = new Livre($id);
        $auteur = new Auteur($livre->id_auteur);
        $this->set(['livre'=>$livre, 'auteur'=>$auteur]);
        $this->render('detail');
    }

    public function new_or_update(){
        $id = isset($_GET['id']) && !empty($_GET['id'])?$_GET['id']:null;
        if (isset($_GET['action']) && $_GET['action']=='new'){
            $auteur = new Auteur();
            $auteurs = $auteur->get_all();
            $this->set(['auteurs'=>$auteurs]);
            $this->render('new');
        } else {
            $livre = new Livre($_GET['id']);
            $auteur = new Auteur();
            $auteurs = $auteur->get_all();
            $this->set(['livre'=>$livre, 'auteurs'=>$auteurs]);
            $this->render('modifier');
        }
    }

    public function ajouter_ou_modifier(){
        $livre = new Livre();
        $livre->nom = $_POST['nom'];
        $livre->id_auteur = $_POST['id_auteur'];
        $livre->resume = $_POST['resume'];
        $livre->isbn = $_POST['isbn'];
        $livre->prix = $_POST['prix'];

        if ($_GET['action']=='modify'){
            $livre->id = $_GET['id'];
            $livre->update();
        }else {
            $livre->create();
        }
        header('Location:'.ROOT.'livre/liste');
    }

    public function supprimer()
    {
        $id = $_GET['id'];
        $livre = new Livre($id);
        $livre->delete();
        header('Location:'.ROOT.'livre/liste');
    }
}