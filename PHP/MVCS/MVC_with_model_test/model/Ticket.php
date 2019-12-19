<?php

class Ticket extends Model {
    public $id;
    public $id_user;
    public $title;
    public $content;
    public $priority;
    public $attached_file;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM ticket WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->id_user = $data['id_user'];
            $this->title = $data['title'];
            $this->content = $data['content'];
            $this->priority = $data['priority'];
            $this->attached_file = $data['attached_file'];
        }
    }

    public function get_all (){
        $req = $this->bdd->prepare('SELECT * FROM ticket');
        $req->execute();
        $tickets = [];
        while ($row = $req->fetch()){
            $ticket = new Ticket();
            $ticket->id = $row['id'];
            $ticket->id_user = $row['id_user'];
            $ticket->title = $row['title'];
            $ticket->content = $row['content'];
            $ticket->priority = $row['priority'];
            $ticket->attached_file = $row['attached_file'];
            $tickets[] = $ticket;
        }
        return $tickets;
    }

    public function get_all_user (){
        $req = $this->bdd->prepare('SELECT * FROM ticket WHERE id_user=:id_user');
        $req->bindValue(':id_user', $this->id_user);
        $req->execute();
        $tickets = [];
        while ($row = $req->fetch()){
            $ticket = new Ticket();
            $ticket->id = $row['id'];
            $ticket->id_user = $row['id_user'];
            $ticket->title = $row['title'];
            $ticket->content = $row['content'];
            $ticket->priority = $row['priority'];
            $ticket->attached_file = $row['attached_file'];
            $tickets[] = $ticket;
        }
        return $tickets;
    }

    public function max_id(){
        $req = $this->bdd->query('SELECT MAX(id) AS max_id FROM ticket');
        $row = $req->fetch();
        $max_id = (int)$row['max_id'];
        $req->closeCursor();
        return ($max_id == null)? 0 : $max_id;
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO ticket (id_user, title, content, priority, attached_file) VALUE (:id_user, :title, :content, :priority, :attached_file)');
        $req->bindValue(':id_user', $this->id_user);
        $req->bindValue(':title', $this->title);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':priority', $this->priority);
        $req->bindValue(':attached_file', $this->attached_file);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare("UPDATE ticket SET id_user=:id_user, title=:title, content=:content, priority=:priority, attached_file=:attached_file WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->bindValue(':id_user', $this->id_user);
        $req->bindValue(':title', $this->title);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':priority', $this->priority);
        $req->bindValue(':attached_file', $this->attached_file);
        $req->execute();
    }

    public function delete(){

        //Suppression du ticket
        $req = $this->bdd->prepare("DELETE FROM ticket WHERE id=:id");
        $req->bindValue(':id', $this->id);
        $req->execute();

        //Suppression des commentaires
        $del_response  = $this->bdd->prepare("DELETE FROM response WHERE id_ticket=:id");
        $del_response->bindValue(':id', $this->id);
        $del_response->execute();
    }
}