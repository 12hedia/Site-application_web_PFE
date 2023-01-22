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
<h1 style="color:white; left:32%; position:absolute; ">Liste des actualités centre archivés</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:12%; top:170px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher actualité centre…" />
</form >
<center><table  style="position:absolute; left:20px; top:240px;">
<tr>
<th>Date d'archivage</th>

<th>Titre</th>
<th>Description</th>

<th>utilisateur</th>
<th>Restaurer</th>
<th>supprimer</th>
</tr>
<?php 
$email= $_GET['email'] ;
require('database_connection.php');
$recherche="";
if( isset($_POST['recherche'])){

    $recherche= $_POST['recherche'];
    $req="SELECT   *  from archive_actualite_centre WHERE titre_act like '%$recherche%' OR descrip_act_cent like '%$recherche%';";
    $i=0;
    if($result = mysqli_query($con,$req)){ 

      while($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td class='td-left' >".$row['date_arch']."</td>";
        echo "<td>".$row['titre_act']."</td>";
        echo "<td>".$row['descrip_act_cent']."</td>";
    
        echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
        $result3 = mysqli_query($con,$req3); 
        $row3=mysqli_fetch_assoc($result3);
        echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";
    
        echo "</td></table>";
        echo "<td><a href ='restaureractualitecentre.php?id=".$row['id_arch']."&email=".$email."'><img src='updating-arrows.png' style='width:40px; height:30px;'></a></td>";
        echo "<td class='td-right'><a href ='deleteactualitecentre.php?id=".$row['id_arch']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
        echo "<tr>";
        $i++;
      }

    }}
    else{

$sql = "SELECT * FROM archive_actualite_centre;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td class='td-left' >".$row['date_arch']."</td>";
    echo "<td>".$row['titre_act']."</td>";
    echo "<td>".$row['descrip_act_cent']."</td>";

    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='restaureractualitecentre.php?id=".$row['id_arch']."&email=".$email."'><img src='updating-arrows.png' style='width:40px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='deleteactualitecentre.php?id=".$row['id_arch']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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