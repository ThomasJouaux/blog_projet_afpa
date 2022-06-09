<?php 
include 'db.php';
$connexion = ConnexionBase();
$id = $_POST['id'];
var_dump($id);
$title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : NULL;

$article = (isset($_POST['article']) && $_POST['article'] != "") ? $_POST['article'] : NULL;

$date = date('l jS \of F Y h:i:s A');


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
    
$article = str_replace("'", "''", $article);
$requete = $connexion -> prepare("UPDATE articles SET title_art = '$title' , date_art = '$date' , article_picture = '$fileName' , article_complet = '$article' 
WHERE article_id = '$id' ");
$requete->execute();
$requete->closeCursor();
if($requete){
    header('Refresh: 0 ; url=index.php');
}