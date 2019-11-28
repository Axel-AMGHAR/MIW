<?php


class Auteur extends Model {
    public $id;
    public $nom;
    public $prenom;
    public $date_naissance;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM auteur WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
            $this->date_naissance = $data['date_naissance'];
        }
    }

    public function get_all (){
        $req = $this->bdd->prepare('SELECT * FROM auteur');
        $req->execute();
        $auteurs = [];
        while ($row = $req->fetch()){
            $auteur = new Auteur();
            $auteur->id = $row['id'];
            $auteur->nom = $row['nom'];
            $auteur->prenom = $row['prenom'];
            $auteur->date_naissance = $row['date_naissance'];
            $auteurs[] = $auteur;
        }
        return $auteurs;
    }

    public function get_livres (){
        $req = $this->bdd->prepare('SELECT * FROM livre where id_auteur=$id');
        $req->execute();
        $auteurs = [];
        while ($row = $req->fetch()){
            $auteur = new Livre();
            $auteur->id = $row['id'];
            $auteur->nom = $row['nom'];
            $auteur->prenom = $row['prenom'];
            $auteur->date_naissance = $row['date_naissance'];
            $auteurs[] = $auteur;
        }
        return $auteurs;
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO auteur (nom, prenom, date_naissance) VALUE (:nom, :prenom, :date_naissance)');
        $req->bindValue(':nom', $this->nom);
        $req->bindValue(':prenom', $this->prenom);
        $req->bindValue(':date_naissance', $this->date_naissance);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare("UPDATE auteur SET nom=:nom, prenom=:prenom, date_naissance=:date_naissance WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->bindValue(':nom', $this->nom);
        $req->bindValue(':prenom', $this->prenom);
        $req->bindValue(':date_naissance', $this->date_naissance);
        $req->execute();
    }

    public function delete(){
        $req = $this->bdd->prepare("DELETE FROM auteur WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->execute();
    }
}