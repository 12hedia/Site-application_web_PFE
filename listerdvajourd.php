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
<h1 style="color:white; left:36%; position:absolute; ">Liste des RDV d'aujourd'hui</h1>

<center><table  style="position:absolute; left:150px; top:200px;">
<tr>
<th>Date</th>
<th>Heure</th>
<th>Patiente</th>
<th>activite</th>
<th>utilisateur</th>
<th>supprimer</th>
</tr>
<?php 
$email= $_GET['email'] ;

require('database_connection.php');


$sql = "SELECT * FROM rdv WHERE DATE(date_rdv) = CURDATE() ;";

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





    echo "<td><table>";
    while ( $row1 = mysqli_fetch_assoc($result1)){
       $req5="SELECT  *  FROM seance WHERE id_seance= ".$row1['id_seance'].";";
    $result5 = mysqli_query($con,$req5); 
    $row5 =mysqli_fetch_assoc($result5);

    $req1="SELECT * FROM activite WHERE id_activite=".$row5['id_activite'].";";
    $result2 = mysqli_query($con,$req1); 
    $row2=mysqli_fetch_assoc($result2);
    echo "<tr>  <td>".$row2['duree']. "minute</td>";



  echo "   <td>".$row5['type_sean']. "</td>";
  

  
  }
 
  echo "</td></table>";
    echo "<td><table>";$req3="SELECT * FROM compte_user WHERE cin=".$row['cin'].";";
    $result3 = mysqli_query($con,$req3); 
    $row3=mysqli_fetch_assoc($result3);
    echo "  <td>".$row3['nom_pre']. "</td>";"</table></td>";

    echo "</td></table>";
    echo "<td class='td-right'><a href ='supprimerrdv.php?id=".$row['id_rdv']."&email=".$email."'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
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
<a href="calendrier.php?email=<?php echo $_GET['email'] ?>" ><div id='ajouter'style="position:absolute; width:110px; height:100px; background:url(calendar_office_day_1474.ico); background-repeat: round;left:450px; top:60px; "> </div> </a>

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