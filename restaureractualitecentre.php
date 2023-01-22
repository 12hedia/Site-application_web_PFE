<?php
require('database_connection.php');
$email= $_GET['email'] ;
session_start();
$sql1="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result2 = mysqli_query($con,$sql1))
{
    $row3=mysqli_fetch_assoc($result2);

$cin= $row3['cin'];} 

$query=" SELECT * FROM `archive_actualite_centre` WHERE `archive_actualite_centre`.`id_arch` =".$_GET['id'];
$result = mysqli_query($con,$query);
if ($result)
{    $row = mysqli_fetch_assoc($result);

    $query1=" SELECT * FROM `actualite_centre` WHERE `actualite_centre`.`id_act_cent` =".$row['id_act_cent'];
    $result1 = mysqli_query($con,$query1);
if($result1== true || mysqli_num_rows($result)==0 ){
    $file=$row['img_act'];
    $file1=addslashes($file);
   $sql="INSERT INTO actualite_centre values(0,'".$row['titre_act']."','".$row['descrip_act_cent']."','$file1', '$cin')";
   if(mysqli_query($con,$sql)){

    $query=" DELETE FROM `archive_actualite_centre` WHERE `archive_actualite_centre`.`id_arch` ='".$_GET['id']."';";
if(mysqli_query($con,$query))

{
   

   echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' >restauration effectuée avec succès </p>
   
   <a  href='archiveactualitecentre.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
   </div>";
}
   }else {
    echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' > compte était déjà restauré </p>
   
    <a  href='archiveactualitecentre.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
    
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