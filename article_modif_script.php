<?php 
include 'db.php';
$connexion = ConnexionBase();
//Recuperation de l'id via php?id="<?= ..?//
$id = $_POST['id'];
var_dump($id);
//Recuperation de la valeur des input
$title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : NULL;

$article = (isset($_POST['article']) && $_POST['article'] != "") ? $_POST['article'] : NULL;

$date = date('l jS \of F Y h:i:s A');

// impose une taille de fichier max 
$sizeMax =  1048576;
//recupere le nom de l'image
    $fileName = basename($_FILES["imageUploadModif"]["name"]);
// recupere l'extention de l'image (jpeg etc)
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    var_dump($fileType);
    //recupere la taille de l'image
    $fileSize = $_FILES["imageUploadModif"]["size"];
    var_dump($fileSize);
    $fileEmp = $_FILES["imageUploadModif"]["tmp_name"]; // Emplacement du fichier de maniere temporaire sur le serveur
    var_dump($fileEmp);
    // Recupere un message d'erreur
    $fileError = $_FILES["imageUploadModif"]["error"];
    var_dump($fileError);
    // Recupere le lien du dossier image 
    $path = $_SERVER['DOCUMENT_ROOT'] . "/img/";
    // une fois tout recuperer et que la recuperation est valide on test les images pour verif que ce soit bien des images
    if (isset($_FILES['imageUploadModif'])) {
        // test l'extension des images
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "PNG") {
            echo "Erreur de l'extension";
        } else if ($fileSize > $sizeMax) // Test si la taille de l'image est inferieur a la taille imposé
         {
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