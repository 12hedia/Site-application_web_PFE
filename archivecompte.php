<html>
<head>
<title></title>
<link href="listecompte.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php

session_start();
?>
<h1 style="color:white; left:33%; position:absolute; ">Liste des comptes archivés</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:15%; top:135px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher compte utilisateur .…" />
</form >
<center><table style="position:absolute; left:20px; top:190px;">
<tr>
<th>Date d'archivage</th>
<th>CIN</th>
<th>Nom et prénom</th>
<th> Email</th>
<th> Password</th>
<th>Téléphone</th>
<th> Post</th>
<th>Restaurer</th>
<th>supprimer</th>
</tr>
<?php 
$email= $_GET['email'] ;
require('database_connection.php');
$recherche="";
if( isset($_POST['recherche'])){

  $recherche= $_POST['recherche'];

 $req="SELECT   *  from archive_compte_user WHERE cin like '%$recherche%' OR nom_pre like '%$recherche%'  OR email like '%$recherche%'  OR num_tel like '%$recherche%'  OR post like '%$recherche%';";
  $i=0;
 if($result = mysqli_query($con,$req)){ 
 while($row = mysqli_fetch_assoc($result))
    {
     echo "<tr>";
     echo "<td class='td-left' >".$row['date_arch']."</td>";
      echo "<td>".$row['cin']."</td>";
     echo "<td>".$row['nom_pre']."</td>";
      echo "<td>".$row['email']."</td>";
     echo "<td>".$row['password']."</td>";
      echo "<td>".$row['num_tel']."</td>";
    echo "<td>".$row['post']."</td>";
    echo "<td><a href ='restaurercompte.php?id=".$row['id_arch']."&email=".$email."'><img src='updating-arrows.png' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='deletecompte.php?id=".$row['id_arch']. "&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
$sql = "SELECT * FROM archive_compte_user;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td class='td-left' >".$row['date_arch']."</td>";
    echo "<td >".$row['cin']."</td>";
    echo "<td>".$row['nom_pre']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td>".$row['num_tel']."</td>";
    echo "<td>".$row['post']."</td>";
    
    echo "<td><a href ='restaurercompte.php?id=".$row['id_arch']."&email=".$email."'><img src='updating-arrows.png' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='deletecompte.php?id=".$row['id_arch']. "&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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