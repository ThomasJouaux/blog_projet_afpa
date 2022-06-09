<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
include 'db.php';
$connexion = ConnexionBase();
$requete = $connexion->query("SELECT * FROM articles");
$requete->execute();
$value = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

?>

<body>
  <!-- Bouton ecrire un article  -->
  <a class="btn btn-primary" href="article_form.php" role="button">Ecrire un article</a>
</body>
<div class="container-fluid">


<!-- affichage des choses contenue dans la bdd -->
    <?php foreach ($value as $data) {
    ?>
  <div class="card border-0 align-left col-4" id="card" style="width: 30%;">

    <div class="row col-">
<!-- Affichage de l'image  -->
      <img class="col-6 max-width:20%" src="img/<?= $data->article_picture; ?>" alt="<?= $data->article_picture; ?>" title=" <?= $data->article_form ?>">
      <div class="card-body col-">
        <!-- Affichage du titre de l'article  -->
        <p class="card-title text-right col-"><small><b><?= $data->title_art; ?></b></small>
        <!-- Affichage du contenue de l'article -->
        <p class="card-text text-right col-"><?= $data->article_complet; ?> </p>
        <!-- Affichage de la date a laquelle l'article a ete ecrit ou modifier -->
        <?= '<p class="card-text text-right col-"><small><b>Date : </b>' . $data->date_art . '</p></small>'; ?>
        <!-- Bouton Modifier -->
        <a href="modif_article.php?id=<?php echo $data->article_id; ?>" id="Btn_details" class="btn btn-primary  col-">Modifier</a>
        
      </div>
    </div>
  </div>



<?php } ?>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
</body>

</html>