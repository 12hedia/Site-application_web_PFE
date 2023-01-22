<?php
session_start();
$email= $_GET['email'] ;
$id_fiche= $_GET['id_fiche'] ;
$id_rdv= $_GET['id_rdv'] ;

require('database_connection.php');
$sql7 = "SELECT * FROM fiche_patiente WHERE id_fiche=".$id_fiche." ;";
$result7 = mysqli_query($con,$sql7);
$row7 = mysqli_fetch_assoc($result7);

$sql1 = "SELECT * FROM inscrit WHERE id_fiche=".$id_fiche." ;";
$result1 = mysqli_query($con,$sql1);
if($row1 = mysqli_fetch_assoc($result1)){



 
    $sql3 = "SELECT a.titre_cure AS titre , SUM( s.nb_seance ) AS total FROM seance s INNER JOIN cure_base a  WHERE a.id_cure = ".$row1['id_cure']." and s.id_cure = a.id_cure ;";
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $nb_sean_cure= $row3['total'] ;
    $cure= $row3['titre'];
}else {


    $sql3 = "SELECT * FROM adhere WHERE id_fiche=".$id_fiche." ;";
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    
    $sql4 = "SELECT a.titre_act AS titre , SUM( s.nb_seance ) AS total FROM seance s INNER JOIN actualite_offre a  WHERE a.id_off = ".$row3['id_off']." and s.id_off = a.id_off ;";
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $nb_sean_cure= $row4['total'] ;
    $cure= $row4['titre'];

}
?>
<?php 

$id_fiche= $_GET['id_fiche'] ;
$somme=0 ;

$i = 0;
    $sql = "SELECT id_rdv FROM rdv WHERE id_fiche=".$id_fiche." ;";
    if($result = mysqli_query($con,$sql)){
    while($row = mysqli_fetch_assoc($result)){
     $sql1="SELECT * FROM constitue WHERE id_rdv=".$row['id_rdv'].";";
     $result1 = mysqli_query($con,$sql1);



     $j = 0;
     while ($row1 = mysqli_fetch_assoc($result1)){



        $sql2="SELECT COUNT(id_rdv_sean) AS nb FROM consultation WHERE id_rdv_sean=".$row1['id_rdv_sean'].";";
        $result2 = mysqli_query($con,$sql2);
    
      if($row2 = mysqli_fetch_assoc($result2)){
          $somme= $somme + $row2['nb'];
      }else
      {
          $j++;
      }
    }
    $i++;
}}else{
    echo "vide";
}










?>




<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:850px; height:600px; left:5%; top:30px;">
<a href=""><div class="icon" id="icone_rapport"></div></a>
<a href=""><div class="icon" id="icone_cons"></div></a>
<a href="ajouterconsultation.php?id_rdv=<?php echo $_GET['id_rdv']; ?>&email=<?php echo $_GET['email'] ?>&id_fiche=<?php echo $_GET['id_fiche']; ?>" ><div class="icon" id="icone_ajout" ></div></a>
<center><h1 id="nom_pat" > <?php  echo $row7['np_pat']; ?> </h1></center>
<h2 id="cure" > <?php  echo $cure ; ?> </h2>
<h3 id="nb_consult" ><p> Nombre de séance consulté :   <?php echo $somme; ?> /<?php  echo $nb_sean_cure ;  ?></p> </h3>


<iframe src="historiqueconsultation.php?email=<?php echo $_GET['email'] ?>&id_fiche=<?php echo $_GET['id_fiche']; ?>&id_rdv=<?php echo $_GET['id_rdv']; ?>" name="container" style="position:absolute;left:75px;top:150px; padding:0px; border:2px solid rgba(48, 20, 20, 0.329) ; margin:0px;" width="82%" height="70%"></iframe>









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
#icone_cons{
    background:url(3844438-hamburger-menu-more-navigation_110319.ico);
    background-repeat:round;
    left:65%;
}

#icone_ajout{
    background:url(hospital_medical_consultation_icon_140164.ico);
    background-repeat:round;
    left:87%;
}

#nom_pat{
position:absolute;
color:white;
font-size:40px;
left:37%;

}
#cure{

    position:absolute;
    color:white;
left:43%;
top:60px;
}


#nb_consult{
    position:absolute;
color:white;
left:36%;
top:90px;
}

table{
    position:absolute;
    left:130px;
      top:160px;
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













