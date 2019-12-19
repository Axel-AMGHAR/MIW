<?php

class User extends Model {
    public $id;
    public $name;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM user WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }

    public function get_all (){
        $req = $this->bdd->prepare('SELECT * FROM user');
        $req->execute();
        $users = [];
        while ($row = $req->fetch()){
            $user = new User();
            $user->id = $row['id'];
            $user->name = $row['name'];
            $users[] = $user;
        }
        return $users;
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO user (name) VALUE (:name)');
        $req->bindValue(':name', $this->name);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare("UPDATE user SET name=:name WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->bindValue(':name', $this->name);
        $req->execute();
    }

    public function delete(){
        // Suppression de l'user
        $req = $this->bdd->prepare("DELETE FROM user WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->execute();

        // Suppression de ses sujets
        $del_suj  = $this->bdd->prepare("DELETE FROM ticket WHERE id_user=:id");
        $del_suj->bindValue(':id', $this->id);
        $del_suj->execute();

        // Suppression de ses commentaires
        $del_response  = $this->bdd->prepare("DELETE FROM response WHERE id_user=:id");
        $del_response->bindValue(':id', $this->id);
        $del_response->execute();
    }
}