<?php
session_start();
$email= $_GET['email'] ;
$id_fiche= $_GET['id_fiche'] ;
$id_rdv= $_GET['id_rdv'] ;

?>

<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>


 

<center><table id="tab">
<tr>
<th>Dates consultation </th>
<th>Activités</th>
<th>Durées</th>
<th>Poids</th>
<th>T.V</th>
<th>T.H</th>
<th>Consulter par</th>
<th>rapport</th>
<th>Supprimer</th>
</tr>
<tr>

<?php
  require('database_connection.php');
  $i=0;

$req="SELECT c.id_rdv as id_rdv , c.id_rdv_sean as id_rdv_sean , c.id_seance as id_seance  FROM constitue c INNER JOIN rdv r WHERE c.id_rdv = r.id_rdv AND r.id_fiche=".$_GET['id_fiche'] ;
if($res=mysqli_query($con,$req)){
$i=0;
while ($rows= mysqli_fetch_assoc($res))
{

    $req1="SELECT *  FROM consultation
     WHERE id_rdv_sean='".$rows['id_rdv_sean']."' ;";
    if($res1=mysqli_query($con,$req1)){
$j=0;

while($rows1=mysqli_fetch_assoc($res1)){


    echo"<tr><td>".$rows1['date_cons']."</td>";
  $req2="SELECT * FROM constitue WHERE id_rdv_sean=".$rows1['id_rdv_sean'];
  if($res2=mysqli_query($con,$req2)){
      $rows2=mysqli_fetch_assoc($res2);
$req3="SELECT * FROM seance WHERE id_seance=".$rows2['id_seance'] ;
if ($res3=mysqli_query($con,$req3)){
    $rows3=mysqli_fetch_assoc($res3);

    $req4="SELECT * FROM activite WHERE id_activite=".$rows3['id_activite'];
    if ($res4=mysqli_query($con,$req4)){
        $rows4=mysqli_fetch_assoc($res4);
             echo "<td>".$rows3['type_sean']."</td>";
             echo "<td>".$rows4['duree']."minutes</td>";
             echo "<td>".$rows1['poids_act']." kg</td>";
             echo "<td>".$rows1['tail_v_act']."cm</td>";
             echo "<td>".$rows1['tail_h_act']."cm</td>";


    }
           $req5="SELECT * FROM compte_user WHERE email='".$_GET['email']."';";
           if($res5=mysqli_query($con,$req5)){
           $rows5=mysqli_fetch_assoc($res5);
           echo "<td>".$rows5['nom_pre']."</td>";
           }


           
echo "<td><a href ='rapportpat.php?email=".$_GET['email']."&id_fiche=".$_GET['id_fiche']."&id_rdv_sean=". $rows1['id_rdv_sean']."&id_consult=". $rows1['id_conslt']." '><img src='business_table_order_report_history_2332.ico' style='width:40px; height:30px;'></a></td>";
echo "<td class='td-right'><a href ='supprimerconst.php?'><img src='icons8-poubelle-pleine-50.png' style='width:30px; height:30px;'> </a></td>";
 
}
  }
  
  $j++;
}



        
        
    }



$i++;
}
}


?>

</tr>
</table></center>










<style>
.icon{
 position:absolute;
 width:80px;
 height:80px;
 
}
#icone_rapport{
    background:url(business_table_order_report_history_2332.ico);
    background-repeat:round;
    left:75%;
}

#icone_ajout{
    background:url(hospital_medical_consultation_icon_140164.ico);
    background-repeat:round;
    left:87%;
}



#tab{
    position:absolute;
    left:10px;
      top:10px;
      text-align: center;
}
th{

background-color: maroon;
font-size: 16px;
font-family: 'Times New Roman', Times, serif;

color: white;
border-radius: 8px;
height: 15px;
}

tr{
background-color: rgba(255, 249, 250, 0.171) ;
border-radius: 30px;
padding: 10px;
margin: 5px;
border-color: rgb(231, 37, 69);
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




