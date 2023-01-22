<html>
<head>
<title></title>
<link href="listerepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php

session_start();
?>
<h1 style="color:white; left:40%; position:absolute; ">Liste des repas</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:10%; top:135px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher repas…" />
</form >
<center><table  style="position:absolute; left:100px; top:190px;">
<tr>
<th>Image</th>
<th>Nom</th>
<th>Quantité</th>
<th>Calories</th>
<th>utilisateur</th>
<th>modifier</th>
<th>supprimer</th>
</tr>
<?php 
$email= $_GET['email'] ;
require('database_connection.php');


$recherche="";
if( isset($_POST['recherche'])){

  $recherche= $_POST['recherche'];
  $req="SELECT   *  from repas WHERE nom_rep like '%$recherche%' OR calor_rep like '%$recherche%'  OR qte_rep like '%$recherche%' ;";
  $i=0;
  if($result = mysqli_query($con,$req)){
  while($row= mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_rep']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['nom_rep']."</td>";
    echo "<td>".$row['qte_rep']."</td>";
    echo "<td>".$row['calor_rep']."cal</td>";
    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierrepas.php?id_rep=".$row['id_rep']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerrepas.php?id=".$row['id_rep']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
    echo "<tr>";
    $i++;

  }}

}

else{
$sql = "SELECT id_rep , nom_rep , calor_rep , qte_rep,  img_rep  , cin FROM repas;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_rep']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['nom_rep']."</td>";
    echo "<td>".$row['qte_rep']."</td>";
    echo "<td>".$row['calor_rep']."cal</td>";
    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierrepas.php?id_rep=".$row['id_rep']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerrepas.php?id=".$row['id_rep']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
    echo "<tr>";
    $i++;
  }

}
else
{
  http_response_code(404);
}
}
?>
</table></center>
<a href="ajouterrepas.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; width:110px; height:100px; background:url(3440904-add-ecommerce-favorite-heart-love-plus_107518.ico); left:395px; top:30px; "> </div> </a>

<style>


::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
</style>
</body>
</html>