<?php

function creation_miniature ($ext,$file,$name, $thumbnail_width = null,$thumbnail_height = null){
    switch ($ext){
        case 'gif':
            $source_gd_image = imagecreatefromgif($file);
            break;
        case 'jpeg':
        case 'jpg':
            $source_gd_image = imagecreatefromjpeg($file);
            break;
        case 'png':
            $source_gd_image = imagecreatefrompng($file);
            break;
    }
    if($source_gd_image === false){
        echo 'erreur lors de la récupération de la source de l\'image';
        die();
    }

    $imgsize = getimagesize($file);

    $src_x = 0;
    $src_y = 0;
    if ($thumbnail_width == null ) {
        $thumbnail_width = 100;
        $thumbnail_height = ($imgsize[1] / $imgsize[0]) * $thumbnail_width;
    }
    elseif ($thumbnail_width == null && $thumbnail_height == null)
        $thumbnail_height = ($imgsize[1] / $imgsize[0]) * $thumbnail_width;
    else {
        if ($thumbnail_height > $thumbnail_width){
            $src_y = ( $imgsize[1] - $thumbnail_height) / 2;
            var_dump($src_y);
        } else {
            $src_x = ( $imgsize[0] - $thumbnail_width) /2;
            var_dump($src_x);
        }
    }
    $thumnail = imagecreatetruecolor($thumbnail_width,$thumbnail_height);
    imagecopyresampled($thumnail, $source_gd_image, 0, 0,$src_x,$src_y,$imgsize[0],
        $imgsize[1],$imgsize[0],$imgsize[1]);
    $dossier = "images_redim";
    if (!is_dir($dossier)) mkdir('.\\'.$dossier);
    imagejpeg($thumnail,$dossier.'\\.thum_'.$name,190);
    imagedestroy($source_gd_image);
    imagedestroy($thumnail);
}
if(isset($_FILES['photo'])){
    $file = $_FILES['photo'];

    if($file['error'] == UPLOAD_ERR_OK){
        $dossier = '';
        $file_name = '.\['. microtime(). ']' .$file['name'];
        $ext = explode('.',$file['name']);
        $ext = strtolower($ext[count($ext)-1]);
        $photo = true;

        if ($ext == 'pdf')  $dossier = '.\pdf';
        elseif ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'gif' )
            $dossier = '.\images';
        else $photo = false;

        if ($photo) {
            if (!is_dir($dossier)) mkdir('.\\'.$dossier);

            if (move_uploaded_file($file['tmp_name'], $dossier.$file_name)) {
                creation_miniature($ext, $dossier.$file_name,$file['name'],200,300);
                //header('Location:index.php');
           ; }
            else echo 'echec de l\'upload.';

        } else echo 'le format n\'est pas une image ou un pdf';


    } elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) echo 'la taille du fichier ne doit pas dépasser 2 Mo';
    elseif ($file['error'] == UPLOAD_ERR_NO_FILE) echo ' Aucun fichier n\'a été téléchargé';
}