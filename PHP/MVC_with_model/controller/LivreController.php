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

        $this->set(['livre'=>$livre]);
        $this->render('detail');
    }

    public function new_or_update(){
        $id = isset($_GET['id']) && !empty($_GET['id'])?$_GET['id']:null;
        $livre = new Livre($id);
        //A MODIFIER + mettre le meme nom pour la methode et pour la vue
        if (isset($_GET['action']) && $_GET['action']=='new')
            $this->render('new_livre');
        else {
            $livre = new Livre($_GET['id']);
            $this->set(['livre'=>$livre]);
            $this->render('modifier',$livre);
        }
    }

    public function ajouter_ou_modifier(){
        $livre = new Livre();
        $livre->nom = $_POST['nom'];
        $livre->auteur = $_POST['auteur'];
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