<html>
<head>
<title></title>
<link href="listerepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php


?>
<h1 style="color:white; left:36%; position:absolute; ">Liste des équipements</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:10%; top:170px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher équipement…" />
</form >
<center><table style="position:absolute; left:150px; top:240px;">
<tr>
<th>Image</th>
<th>Code</th>
<th>Nom équipement</th>
<th>Marque</th>
<th>utilisateur</th>
<th>modifier</th>
<th>supprimer</th>
</tr>
<?php 
session_start();
$email= $_GET['email'] ;
require('database_connection.php');
$recherche="";
if( isset($_POST['recherche'])){

    $recherche= $_POST['recherche'];
    $req="SELECT   *  from equipement WHERE code_eq like '%$recherche%' OR nom_eq like '%$recherche%'  OR marq_eq like '%$recherche%';";
    $i=0;
    if($result = mysqli_query($con,$req)){ 
 
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_eq']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['code_eq']."</td>";
    echo "<td>".$row['nom_eq']."</td>";
    echo "<td>".$row['marq_eq']."</td>";
    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierequip.php?id=".$row['code_eq']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:40px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerequip.php?id=".$row['code_eq']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
    echo "<tr>";
    $i++;
  }
    
    }
    else
    {
      http_response_code(404);
    }
  }

 else { 

$sql = "SELECT * FROM equipement;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_eq']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['code_eq']."</td>";
    echo "<td>".$row['nom_eq']."</td>";
    echo "<td>".$row['marq_eq']."</td>";
    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierequip.php?id=".$row['code_eq']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:40px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerequip.php?id=".$row['code_eq']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
    echo "<tr>";
    $i++;
  }

}
else
{
  http_response_code(404);
}}

?>

</table></center>
<a href="ajouterequip.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; width:110px; height:100px; background:url(sound_equipment_16783.ico); left:395px; top:60px; "> </div> </a>
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