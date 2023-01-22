<html>
<head>
<title></title>
<link href="listerepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php


?>
<h1 style="color:white; left:32%; position:absolute; ">Liste des actualités offre</h1>
<input type="text" method="POST" name="rech_repas" style="position:absolute; left:10%; top:170px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher actualité centre…" />
<center><table  style="position:absolute; left:50px; top:240px;">
<tr>
<th >Image</th>
<th>Titre</th>
<th>Prix</th>
<th >Séances</th>

<th>utilisateur</th>
<th>modifier</th>
<th>supprimer</th>
</tr>
<?php 
session_start();
$email= $_GET['email'] ;
require('database_connection.php');

$repas = [];
$sql = "SELECT * FROM actualite_offre WHERE id_off !=2 ;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $req="SELECT  nb_seance , type_sean , id_activite  FROM seance WHERE id_off= ".$row['id_off'].";";
    $result1 = mysqli_query($con,$req); 
  
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_act']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['titre_act']."</td>";
    echo "<td>".$row['prix_off']." dt </td>";
 
echo "<td><table>";
    while ( $row1 = mysqli_fetch_assoc($result1)){
    
     
  echo " <tr> <td>".$row1['nb_seance']. " séance</td>";
  echo "  <td>".$row1['type_sean']. "</td>";
  
  $req1="SELECT * FROM activite WHERE id_activite=".$row1['id_activite'].";";
  $result2 = mysqli_query($con,$req1); 
  $row2=mysqli_fetch_assoc($result2);
  echo "  <td>".$row2['duree']. "minute</td>";
  
  }
 
  echo "</td></table>";

    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierequip.php?id_rep=".$row['id_off']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:40px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerequip.php?id=".$row['id_off']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
    echo "<tr>";
    $i++;
  }

}
else
{
  http_response_code(404);
}

?>
</table></center>
<a href="ajouteractualiteoffre.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; width:110px; height:100px; background:url(google_news_icon_131675.ico); background-repeat: round; left:395px; top:60px; "> </div> </a>

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
