<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-12">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>artist-details</title>
</head>
<body>
<div class="container-fluid">
<?php
require 'db.php';

$db = ConnexionBase();
$id = $_GET['id'];
var_dump($id);
// Requete 1 
$requete1 = $db->prepare("SELECT * FROM articles  WHERE article_id= '$id' ");;
$requete1->execute(array($id));
$article = $requete1->fetch(PDO::FETCH_OBJ);
$requete1->closeCursor();

//Requete 2 



?>

<h1> Modifiez votre article</h1>
<hr>

<form action="article_modif_script.php" method="post" enctype="multipart/form-data">
    <div class="row col-12">
        <p id="inputTxt"> titre </p>
<!-- Titre de l'article -->
        <input class="form-control" name="titleArt" type="text" id="inputModif" placeholder="<?php echo $article->title_art ?>">
    </div>
<!-- Contenue de l'article -->
    <div class="row col-12">
        <p id="inputTxt"> Article complet </p>
        <textarea class="form-control" name="article" id="exampleFormControlTextarea1" rows="3" placeholder="<?= $article->article_complet ?>"></textarea>
    </div>

    </div>
    </div>
    <!-- Bouton ajout d'image -->

    <p class="col-" id="inputTxtPicture">Picture</p>
    <div class="inputFile">
        <input type="file" id="imgModif" name="imageUploadModif" id="buttonFile">
      
       
        <!-- Affichage de l'image  -->
        <div class="row " id="pictureModif"><?= '<img src="img/' . $article->article_picture . '" />'  ?></div>
        <div class="row" id="buttonModif">
            <!-- Bouton modifier -->
            <button class="btn btn-primary" id="modifButton" type="submit">Modifier</button>
            <!-- Bouton Retour -->
            <a class="btn btn-primary" id="retourButton" href="index.php" role="button">Retour</a>
            <input id="prodId" name="id" type="hidden" value="<?php echo $article -> article_id ?>">
            <!-- Bouton Supprimer -->
            <a class="btn btn-primary col-" href="suppr_article.php?id=<?php echo $article->article_id; ?>"role="button">Supprimer</a>

            </body>

</html>