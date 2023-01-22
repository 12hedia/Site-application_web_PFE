<?php
session_start();
$email= $_GET['email'] ;
require('database_connection.php');
$id_rdv=$_GET['id_rdv'] ;
$id_fiche=$_GET['id_fiche'] ;


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




if(isset($_POST['botaj'])){

    $sql8="SELECT * FROM compte_user WHERE email='".$email."' ;";

    if($result18 = mysqli_query($con,$sql8))
    {
        $row18=mysqli_fetch_assoc($result18);
    
    $cin= $row18['cin'];}


$req12="SELECT count(*)  AS total FROM constitue WHERE id_rdv=".$_GET['id_rdv'].";";
        if($result12 = mysqli_query($con,$req12)){
$row12= mysqli_fetch_assoc($result12);
$nb_tot=$row12['total'];
echo $nb_tot ;
$k=0;
$seance=$_POST["c"] ;
for( $k ; $k < $nb_tot ; $k++ ){
        if (isset($seance[$k])){
        
            $req10="INSERT INTO consultation VALUES (0, '".$seance[$k]."',  '".$cin."' , CURDATE()  , '".$_POST['poids']."', '".$_POST['tail_v']."', '".$_POST['tail_h']."' );";
         if(mysqli_query($con,$req10)){
         
        }else {
            echo "";
            
               }
    }

    }
    echo "<div class='forme1'></div><div class='message'>ajout effectuer avec succées !</div>";

   
}
}

?>
<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>



<style>


.forme1{
    position:absolute;
    width:40px;
    height:10px;
    background: maroon;
    right:0px;
    top:38px;
}
.message{

    position:absolute;
    width:250px;
    height:40px;
    background:maroon;
    color:white;
    font-size:18px;
border-radius:10px;
right:20px;




}




#nom_pat{
position:absolute;
color:white;
font-size:20px;
left:35%;
top:50px;

}
#cure{

    position:absolute;
    color:white;
    font-size:20px;
left:30%;
top:70px;
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

<a href="consultation.php?id_rdv=<?php echo $_GET['id_rdv']; ?>&email=<?php echo $_GET['email'] ?>&id_fiche=<?php echo $_GET['id_fiche']; ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
   
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:90px;">Ajouter consultation</h1>


    <center><h1 id="nom_pat" >pour <?php  echo $row7['np_pat']; ?> </h1></center>
<h2 id="cure" >cure: <?php  echo $cure ; ?> </h2>

    <form action="" method="POST" enctype="multipart/form-data" >


<table  style="position:absolute; left:130px; top:120px;" >
<tr>
<th>Séance </th>
<th>Durée</th>
<th>à consulter</th>
</tr>
<tr>

<?php

$requet="SELECT * FROM constitue WHERE id_rdv=".$_GET['id_rdv'].";";
if($resultat=mysqli_query($con,$requet)){
    $j=0;
    while($rows = mysqli_fetch_assoc($resultat)){

$requet1="SELECT s.type_sean AS type_seance , a.duree AS duree FROM seance s INNER JOIN activite a WHERE s.id_activite=a.id_activite AND id_seance='".$rows['id_seance']."';";

if ($resultat1= mysqli_query($con,$requet1)){
    $i=0;
    
    while($rows1 = mysqli_fetch_assoc($resultat1)){

     echo "<tr><td>". $rows1['type_seance'] ."</td>";
     echo"<td>". $rows1['duree'] ." minutes</td>";    
     echo "<td><input type='checkbox' id='check".$i."' name='c[]' value='".$rows['id_rdv_sean']."' />".$rows['id_rdv_sean']."</td></tr>";        


$i++;
    }
  
$j++;
}

}


}

?>




</tr>


</table>



    <label for="poids"  style=" 
position:absolute;
font-size:18px; 
left: 100px;
color:white;
top:350px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Poids :</label> <br>
<input type="number" min=0 step="0.01" id="poids" name="poids" placeholder="poids..."  style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 340px;
color:maroon;
left:190px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>



<label for="tail_v" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 30px;
top:410px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >  Taille de ventre :</label> <br>
<input  type="number" min=0 step="0.01" id="tail_v" name="tail_v" placeholder="taille ventre..." 
style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
 color:maroon;
top: 400px;
left:190px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>
<label for="tail_h"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
color:white;
left: 20px;
top:470px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Taille de Hanche  :</label> <br>
<input  type="number" min=0 step="0.01" id="tail_h" name="tail_h" placeholder="taille hanche..." style="
font-size:16px;
 position:absolute;
 color:maroon;
 width:250px;
 height:40px;
top: 460px;
left:190px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>



<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 550px;
left:100px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Ajouter </button>



</form>    




</div>
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



