<?php

require 'config.php';
$bdd = getDB();

//renvoie le dernier id de la table article
function last_id_article(){
    global $bdd;
    $req = $bdd->query('SELECT MAX(id) AS max_id FROM article');
    $row = $req->fetch();
    $max_id = (int)$row['max_id'];
    $req->closeCursor();
    return ($max_id == null)? 0 : $max_id;
}

function create_folder_if_not_exist (){
    if (!is_dir('.\\upload')){
        mkdir('.\\upload');
    }
    if (!is_dir('.\\upload\\src'))
        mkdir('.\\upload\\src');
    if (!is_dir('upload\\thumb'))
        mkdir('.\\upload\\thumb');
}

//crée une miniature de 100px * 100px
function create_miniature_100($path_file,$ext){
    $folder = 'upload\\thumb\\' ;
    $size = 100;
    $last_path = explode('\\',$path_file);
    $name_file = end($last_path);
    $name_file = explode('.',$name_file)[0];
    if ($ext == "jpg")
        $image_craft = 'imagecreatefromjpeg';
    else
        $image_craft = 'imagecreatefrom'.$ext;
    $source_image = $image_craft($path_file);
    $imgsize = getimagesize($path_file);

    $thumbnail = imagecreatetruecolor($size, $size);

    imagecopyresampled($thumbnail, $source_image, 0, 0, 0, 0, $size, $size, $imgsize[0], $imgsize[1]);
    imagejpeg($thumbnail, $folder.$name_file.'_thumb_150x150.jpg', 90);
    imagedestroy($source_image);
    imagedestroy($thumbnail);
}

//enregistre l'image
function record_image_source($file){

    list($name,$ext) = explode('.',$file['name']);
    $ext = strtolower($ext);
    $id = null;
    ($_POST['action'] == 'update')? $id = $_POST['id_article']:$id = (int)last_id_article() + 1;

    $name_in_folder = '.\\upload\\src\\'. $id . '.' . $ext;

    //ajout dans le dossier
    create_folder_if_not_exist();

    if (!move_uploaded_file($file['tmp_name'], $name_in_folder))
        echo 'echec de l\'upload';
    create_miniature_100($name_in_folder,$ext);
}


function manage_image (){
    if(isset($_FILES['photo'])) {
        $file = $_FILES['photo'];
        //si une photo est passé
        if ($file['error'] == UPLOAD_ERR_OK) {
            $type = $file['type'];
            if ($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/jpg' )
                return;
            record_image_source($file);
            return $file['name'];
        } elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) echo 'La taille du fichier ne doit pas dépasser 2 Mo';
        elseif ($file['error'] == UPLOAD_ERR_NO_FILE) echo 'Aucun fichier n\'a été téléchargé';
    }
}

//insertion en base de donnee
function create_article ($titre,$contenu, $image, $id_user){
    global  $bdd;
    $insert_article = $bdd->prepare('INSERT INTO article (titre, contenu, id_user, datetime, image) 
                                            VALUES (:titre, :contenu, :id_user, NOW(), :image)');
    $insert_article->bindValue('titre', $titre, PDO::PARAM_STR);
    $insert_article->bindValue('contenu', $contenu, PDO::PARAM_STR);
    $insert_article->bindValue('id_user', $id_user, PDO::PARAM_INT);
    $insert_article->bindValue('image', $image, PDO::PARAM_STR);
    $insert_article->execute();
}

function update_article($titre,$contenu, $image){
    global $bdd;
    if($image == null) {
        $name_image = $bdd->prepare('SELECT image FROM article WHERE id=:id_article');
        $name_image->bindValue('id_article', $_POST['id_article'], PDO::PARAM_INT);
        $name_image->execute();
        $name_image = $name_image->fetch();
        $image = $name_image['image'];
    }
    $update_article = $bdd->prepare('UPDATE article SET titre=:titre, contenu=:contenu, datetime=NOW(), image=:image
                                            WHERE id=:id_article');
    $update_article->bindValue('titre', $titre, PDO::PARAM_STR);
    $update_article->bindValue('contenu', $contenu, PDO::PARAM_STR);
    $update_article->bindValue('image', $image, PDO::PARAM_STR);
    $update_article->bindValue('id_article', $_POST['id_article'], PDO::PARAM_INT);
    $update_article->execute();
}

if(isset($_POST['titre']) && isset($_POST['contenu'])){
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $image = manage_image();
        $action = $_POST['action'];
        if ($action == 'create') {
            $id_user = $_POST['id_user'];
            create_article($titre, $contenu, $image, $id_user);
        }
        else
            update_article($titre, $contenu, $image);
}

header('Location: index.php');

