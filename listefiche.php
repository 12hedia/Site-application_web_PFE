<html>
<head>
<title></title>
<link href="listecompte.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>
<?php


?>
<h1 style="color:white; left:33%; position:absolute; ">Liste des fiches patientes</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:10%; top:135px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Rechercher fiche patiente …" />
</form >
<center><table cellspacing="0" style="position:absolute; left:20px; top:190px;">
<tr>
<th>Nom et prénom</th>
<th>Age</th>
<th> Poids</th>
<th>T-V </th>
<th>T-H</th>
<th> Taille</th>
<th>email</th>
<th>password </th>
<th>téléphone</th>
<th> payer</th>
<th>fond</th>
<th> coté</th>

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



  $sql = "SELECT * FROM fiche_patiente WHERE np_pat like '%$recherche%' OR  email_pat like '%$recherche%' OR  telephone like '%$recherche%' ;";

  if($result = mysqli_query($con,$sql))
  {
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
      echo "<tr>";
      echo "<td class='td-left'>".$row['np_pat']."</td>";
      echo "<td>".$row['age_pat']."</td>";
      echo "<td>".$row['poids_pat']."</td>";
      echo "<td>".$row['tail_v_pat']."</td>";
      echo "<td>".$row['tail_h_pat']."</td>";
      echo "<td>".$row['tail_pat']."</td>";
      echo "<td>".$row['email_pat']."</td>";
      echo "<td>".$row['password_pat']."</td>";
      echo "<td>".$row['telephone']."</td>";
      echo "<td>".$row['payer']."</td>";
      echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_fond']).'" style=" width:40px ; height:40px;" /> </td>'; 
      echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_cot']).'" style=" width:40px ; height:40px;" /> </td>'; 
    
      echo "<td><a href ='modifierfiche.php?id=".$row['id_fiche']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
      echo "<td class='td-right'><a href ='supprimerfiche.php?id=".$row['id_fiche']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
      echo "<tr>";
      $i++;
    }
  
  }
  else
  {
    http_response_code(404);
  }



}else {
$repas = [];
$sql = "SELECT * FROM fiche_patiente;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td class='td-left'>".$row['np_pat']."</td>";
    echo "<td>".$row['age_pat']."</td>";
    echo "<td>".$row['poids_pat']."</td>";
    echo "<td>".$row['tail_v_pat']."</td>";
    echo "<td>".$row['tail_h_pat']."</td>";
    echo "<td>".$row['tail_pat']."</td>";
    echo "<td>".$row['email_pat']."</td>";
    echo "<td>".$row['password_pat']."</td>";
    echo "<td>".$row['telephone']."</td>";
    echo "<td>".$row['payer']."</td>";
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_fond']).'" style=" width:40px ; height:40px;" /> </td>'; 
    echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_cot']).'" style=" width:40px ; height:40px;" /> </td>'; 
  
    echo "<td><a href ='modifierfiche.php?id=".$row['id_fiche']."&email=".$email."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerfiche.php?id=".$row['id_fiche']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
<a href="ajouterfiche.php?email=<?php echo $_GET['email'] ?>"><div id='ajouter'style="position:absolute; width:80px; height:80px; background:url(file_new_add_13908.ico); left:430px; top:55px; background-repeat:round; "> </div> </a>

<style>
.cont2{
    position: absolute;
    margin:0px;
    background-color:pink;
    padding:0px;
color: maroon;
width: 125px;
height: 50px;
}
th{

    background-color: maroon;
    font-size: 18px;
    font-family: 'Times New Roman', Times, serif;

    color: white;
border-radius: 8px;
height: 15px;
}
table{
    text-align: center;
}
tr{
    background-color: rgba(255, 249, 250, 0.171) ;
    border-radius: 30px;
    padding: 10px;
    margin: 5px;
    border-color: rgb(231, 37, 69);
border-color: white;


}
.td-left{
border-top-left-radius: 25px;
border-bottom-left-radius: 25px;

}
.td-right{
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
}
td{
font-family: 'Times New Roman', Times, serif;
font-size: 14px;
border-color: white;

}




</style>
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