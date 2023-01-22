
<html>
<head>
<title></title>
<link href="listerdvv.css" rel="stylesheet">
</head>
<body>
<?php $email=$_GET['email'] ;

?>
<?php $date=$_GET['date']; 
?>


<h1 style="color:white; left:15%; position:absolute; font-size:20px;">Liste des RDV de <?php 
echo $date;?> </h1>
<center><table  style="position:absolute; left:10px; top:100px;">
<tr>
<th>Date</th>
<th>Heure</th>
<th>Patiente</th>
<th>Utilisateur</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php 
$email= $_GET['email'] ;
session_start();
require('database_connection.php');


$sql = "SELECT * FROM rdv WHERE date_rdv ='$date';";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {

    $req="SELECT  id_seance  FROM constitue WHERE id_rdv= ".$row['id_rdv'].";";
    $result1 = mysqli_query($con,$req); 

    
    echo "<tr>";
    echo "<td  class='td-left'>".$row['date_rdv']."</td>";
    echo "<td>".$row['heure_rdv']."</td>";

  
    echo "<td><table>";$req4="SELECT * FROM fiche_patiente WHERE id_fiche=".$row['id_fiche'].";";
    $result4 = mysqli_query($con,$req4); 
    $row4=mysqli_fetch_assoc($result4);
    echo "  <td>".$row4['np_pat']. "</td>";"</table></td>";

    echo "</td></table>";





    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td><a href ='modifierrdv.php?id=".$row['id_rdv']."&email=".$email."&date=".$_GET['date']."'><img src='sheetandpencil_118361.ico' style='width:30px; height:30px;'></a></td>";
    echo "<td class='td-right'><a href ='supprimerrdv1.php?id=".$row['id_rdv']."&email=".$email."&date=".$date."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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







