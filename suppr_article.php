<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
require 'db.php';
$db = ConnexionBase();
$id = $_GET['id'];
// intval($id);
$requete1 = $db->prepare("SELECT * FROM articles WHERE article_id= ? ");
$requete1->execute(array($id));
$article_id = $requete1->fetch(PDO::FETCH_OBJ);
var_dump($id);
$requete1->closeCursor();
?>
<script type="text/javascript">
    var result = confirm("Voulez vous vraiment supprimer ce disque ? ") 
        if ( result == true) {
            <?php
          

            $requete2 = $db->prepare("DELETE FROM articles WHERE article_id = '$id' ");
            $requete2->execute();
            $requete2->closeCursor();
              
            ?>
            
         } 
 </script> 

<?php
if($requete1){
                  header('Refresh :0 ; url=index.php');
              }
?>
</body>
</html>