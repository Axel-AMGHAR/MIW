<?php

class AuteurController extends Controller {

    public function liste(){
        $auteur = new Auteur();
        $auteurs = $auteur->get_all();
        $this->set(['auteurs'=>$auteurs]);
        $this->render('liste');
    }

    public function detail(){
        $id = (int)$_GET['id'];

        $auteur = new Auteur($id);
        $livres = $auteur->get_livres();
        $this->set(['auteur'=>$auteur,'livres'=>$livres]);
        $this->render('detail');
    }

    public function new_or_update(){
        if (isset($_GET['action']) && $_GET['action']=='new')
            $this->render('new');
        else {
            $id = isset($_GET['id']) && !empty($_GET['id'])?$_GET['id']:null;
            $auteur = new Auteur($id);
            $this->set(['auteur'=>$auteur]);
            $this->render('modifier');
        }
    }

    public function ajouter_ou_modifier(){
        $auteur = new Auteur();
        $auteur->nom = $_POST['nom'];
        $auteur->prenom = $_POST['prenom'];
        $auteur->date_naissance = $_POST['date_naissance'];

        if ($_GET['action']=='modify'){
            $auteur->id = $_GET['id'];
            $auteur->update();
        }else {
            $auteur->create();
        }
        header('Location:'.ROOT.'auteur/liste');
    }

    public function supprimer()
    {
        $id = $_GET['id'];
        $auteur = new Auteur($id);
        $auteur->delete();
        header('Location:'.ROOT.'auteur/liste');
    }
}