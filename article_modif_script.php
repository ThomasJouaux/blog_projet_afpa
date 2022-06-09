<?php 
include 'db.php';
$connexion = ConnexionBase();
$id = $_POST['id'];
$title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : NULL;
var_dump($title);
$article = (isset($_POST['article']) && $_POST['article'] != "") ? $_POST['article'] : NULL;




$sizeMax =  1048576;
    $fileName = basename($_FILES["imageUploadModif"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    var_dump($fileType);
    $fileSize = $_FILES["imageUploadModif"]["size"];
    var_dump($fileSize);
    $fileEmp = $_FILES["imageUploadModif"]["tmp_name"]; // Emplacement du fichier de maniere temporaire sur le serveur
    var_dump($fileEmp);
    $fileError = $_FILES["imageUploadModif"]["error"];
    var_dump($fileError);
    $path = $_SERVER['DOCUMENT_ROOT'] . "/img/";
    if (isset($_FILES['imageUploadModif'])) {
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "PNG") {
            echo "Erreur de l'extension";
        } else if ($fileSize > $sizeMax) {
            echo "Fichier trop grand !";
        } else {
            //Si tout est validé , envoie vers le dossier
            move_uploaded_file($fileEmp, $path . $fileName);
            echo "Upload reussi";
        }
    }

