<?php

include 'connexion_bdd.php';
$country_code = $_GET['countrycode'];
$name_country = $_GET['name'];

//renvoie le dernier id de la table gallery
function last_id_gallery(){
    global $bdd;
    $req = $bdd->query('SELECT MAX(id_gallery) AS max_id FROM gallery');
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

//crée une miniature de 150px * 150px
function create_miniature_150($path_file,$ext){
    $folder = 'upload\\thumb\\' ;
    $size = 150;
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
    global $country_code, $bdd;

    list($name_in_base,$ext) = explode('.',$file['name']);
    $ext = strtolower($ext);
    $description = $_POST['description'];

    //insertion en base de donnee
    $insert_image = $bdd->prepare('INSERT INTO gallery (name, description, countrycode) 
                                            VALUES (:name_in_base, :description, :country_code)');
    $insert_image->bindValue('name_in_base', $name_in_base. '.' .$ext, PDO::PARAM_STR);
    $insert_image->bindValue('description', $description, PDO::PARAM_STR);
    $insert_image->bindValue('country_code', $country_code, PDO::PARAM_STR);
    $insert_image->execute();

    $name_in_folder = '.\\upload\\src\\'. last_id_gallery() . '.' . $ext;
    //ajout dans le dossier
    create_folder_if_not_exist();

    if (!move_uploaded_file($file['tmp_name'], $name_in_folder))
        echo 'echec de l\'upload';
    create_miniature_150($name_in_folder,$ext);
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
        } elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) echo 'La taille du fichier ne doit pas dépasser 2 Mo';
        elseif ($file['error'] == UPLOAD_ERR_NO_FILE) echo 'Aucun fichier n\'a été téléchargé';
    }
}

manage_image();

header('Location:pays.php?countrycode=' . $country_code . '&name=' . $name_country);
