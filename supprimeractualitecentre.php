<?php
require('database_connection.php');
$email= $_GET['email'] ;
$id= $_GET['id'] ;
session_start();
echo $id;
$sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result2 = mysqli_query($con,$sql))
{
    $row3=mysqli_fetch_assoc($result2);

$cin= $row3['cin'];}
$req="SELECT * FROM actualite_centre WHERE id_act_cent='".$_GET['id']."';";

if($result1 = mysqli_query($con,$req)){
$row = mysqli_fetch_assoc($result1);

$file=$row['img_act'];
$file1=addslashes($file);
  $req1="INSERT INTO archive_actualite_centre  VALUES (0,'".$row['id_act_cent']."','".$row['titre_act']."','".$row['descrip_act_cent']."','$file1','".$row3['cin']."', CURDATE())";
 if(mysqli_query($con,$req1)){
  
$query=" DELETE FROM `actualite_centre` WHERE `actualite_centre`.`id_act_cent` ='".$_GET['id']."';";
$result = mysqli_query($con,$query);
if ($result){
   
   
echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' > compte était archivé avec succès </p>
   
 <a  href='listeactualitecentre.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
</div>";
  
}
 }
}


?>

<style >
a {
    color:black;
}
a:hover {
color:white ;
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