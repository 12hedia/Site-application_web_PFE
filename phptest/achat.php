<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form action="p2.php" method="get">
    <h3>Produit : </h3>
 <select name="produit">
    <option name="o1"> stylo </option>
    <option name="o2"> pin </option>
    <option name="o3"> bejj </option>
    <option name="o4"> houd </option>
</select>   
<h3>Quantite  : </h3>
<input name="qqt"  type="text"> </input>
<h3>Nom  : </h3>
<input name="nom"  type="text" required> </input>
<h3>Prenom  : </h3>
<input name="pren"  type="text" required> </input> <br><br><br><br>
<button id="b1" name="boutton" > Send </button>
</form>
</body>
</html>