<?php 
session_unset();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h3>Produit : </h3> <?php  echo $_GET['produit'];?>
<h3>Quantite  : </h3> <?php  echo $_GET['qqt'];?>
<h3>Nom  : </h3> <?php  echo $_GET['nom'];?>
<h3>Prenom  : </h3> <?php  echo $_GET['pren'];?>

</body>
</html>