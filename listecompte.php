<html>
<head>
<title></title>
<link href="listecompte.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php


?>
<h1 style="color:white; left:33%; position:absolute; ">Liste des comptes utilisateur</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:10%; top:135px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher compte utilisateur .…" />
</form >
<center><table style="position:absolute; left:80px; top:190px;">
<tr>
<th>CIN</th>
<th>Nom et prénom</th>
<th> Email</th>
<th> Password</th>
<th>Téléphone</th>
<th> Post</th>
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

 $req="SELECT   *  from compte_user WHERE cin like '%$recherche%' OR nom_pre like '%$recherche%'  OR email like '%$recherche%'  OR num_tel like '%$recherche%'  OR post like '%$recherche%';";
  $i=0;
 if($result = mysqli_query($con,$req)){ 
 while($row = mysqli_fetch_assoc($result))
    {
     echo "<tr>";
      echo "<td class='td-left'>".$row['cin']."</td>";
     echo "<td>".$row['nom_pre']."</td>";
      echo "<td>".$row['email']."</td>";
     echo "<td>".$row['password']."</td>";
      echo "<td>".$row['num_tel']."</td>";
    echo "<td>".$row['post']."</td>";
    echo "<td><a href ='modifiercompte.php?cin=".$row['cin']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimercompte.php?cin=".$row['cin']. "&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
$sql = "SELECT * FROM compte_user;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td class='td-left'>".$row['cin']."</td>";
    echo "<td>".$row['nom_pre']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td>".$row['num_tel']."</td>";
    echo "<td>".$row['post']."</td>";
    echo "<td><a href ='modifiercompte.php?cin=".$row['cin']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimercompte.php?cin=".$row['cin']. "&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
<a href="ajoutercompte.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; width:80px; height:80px; background:url(business_application_addmale_useradd_insert_add_user_client_2312.ico); left:430px; top:55px; background-repeat:round; "> </div> </a>

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