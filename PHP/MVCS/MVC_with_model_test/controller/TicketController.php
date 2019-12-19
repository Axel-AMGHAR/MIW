<?php

class TicketController extends Controller {

    public function liste(){
        $ticket = new Ticket();
        $tickets = $ticket->get_all();
        $this->set(['tickets'=>$tickets]);
        $this->render('liste');
    }

    public function detail(){
        $id = (int)$_GET['id'];
        $ticket = new Ticket($id);
        $user = new User($ticket->id_user);
        $response = new Response();
        $response->id_ticket = $id;
        $responses = $response->get_all_from_ticket();
        $users = $user->get_all();
        $this->set(['ticket'=>$ticket, 'user'=>$user, 'responses'=>$responses, 'users'=>$users]);
        $this->render('detail');
    }

    public function _new(){
        $user = new User();
        $users = $user->get_all();
        $this->set(['users'=>$users]);
        $this->render('new');
    }

    public function ajouter(){

        function create_folder_if_not_exist ()
        {
            if (!is_dir('.\\upload')) {
                mkdir('.\\upload');
            }
        }

        $ticket = new Ticket();
        $ticket->title = $_POST['title'];
        $ticket->id_user = $_POST['id_user'];
        $ticket->content = $_POST['content'];
        $ticket->priority = $_POST['priority'];

        if(isset($_FILES['attached_file'])) {
            $file = $_FILES['attached_file'];
            if ($file['error'] == UPLOAD_ERR_OK) {
                $lastid = new Ticket();
                $lastid = $lastid->max_id();
                $name_in_folder = './upload/'.  $lastid . $file['name'] ;
                $ticket->attached_file = $name_in_folder;

                //ajout dans le dossier
                create_folder_if_not_exist();
                if (!move_uploaded_file($file['tmp_name'], $name_in_folder))
                    echo 'echec de l\'upload';

            } elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) echo 'La taille du fichier ne doit pas dépasser 2 Mo';
            elseif ($file['error'] == UPLOAD_ERR_NO_FILE) echo 'Aucun fichier n\'a été téléchargé';
        }

        $ticket->create();
        header('Location:'.ROOT.'ticket/liste');
    }

    public function supprimer(){
        $id = $_GET['id'];
        $ticket = new Ticket($id);
        $ticket->delete();
        header('Location:'.ROOT.'ticket/liste');
    }
}