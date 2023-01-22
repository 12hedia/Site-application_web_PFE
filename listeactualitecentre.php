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
<h1 style="color:white; left:34%; position:absolute; ">Liste des actualités centre</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:12%; top:170px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher actualité centre…" />
</form >
<center><table  style="position:absolute; left:20px; top:240px;">
<tr>
<th>Image</th>
<th>Titre</th>
<th>Description</th>

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
    $req="SELECT   *  from actualite_centre WHERE titre_act like '%$recherche%' OR descrip_act_cent like '%$recherche%';";
    $i=0;
    if($result = mysqli_query($con,$req)){ 

      while($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_act']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
        echo "<td>".$row['titre_act']."</td>";
        echo "<td>".$row['descrip_act_cent']."</td>";
    
        echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
        $result3 = mysqli_query($con,$req3); 
        $row3=mysqli_fetch_assoc($result3);
        echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";
    
        echo "</td></table>";
        echo "<td><a href ='modifieractualitecentre.php?id=".$row['id_act_cent']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:40px; height:30px;'></a></td>";
        echo "<td class='td-right'><a href ='supprimeractualitecentre.php?id=".$row['id_act_cent']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
        echo "<tr>";
        $i++;
      }

    }}
    else{

$sql = "SELECT * FROM actualite_centre;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_act']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['titre_act']."</td>";
    echo "<td>".$row['descrip_act_cent']."</td>";

    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifieractualitecentre.php?id=".$row['id_act_cent']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:40px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimeractualitecentre.php?id=".$row['id_act_cent']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
<a href="ajouteractualitecentre.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; background-repeat:round; width:110px; height:100px; background:url(1492616986-4-google-news-data-newspaaper-newsfeed-service-daily_83423.ico); left:400px; top:60px; "> </div> </a>

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