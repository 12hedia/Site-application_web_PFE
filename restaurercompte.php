<?php
require('database_connection.php');
$email= $_GET['email'] ;
session_start();
$query=" SELECT * FROM `archive_compte_user` WHERE `archive_compte_user`.`id_arch` =".$_GET['id'];
$result = mysqli_query($con,$query);
if ($result)
{    $row = mysqli_fetch_assoc($result);

    $query1=" SELECT * FROM `compte_user` WHERE `compte_user`.`cin` =".$row['cin'];
    $result1 = mysqli_query($con,$query1);
if($result1== true || mysqli_num_rows($result)==0 ){

   $sql="INSERT INTO compte_user values('".$row['cin']."','".$row['nom_pre']."','".$row['email']."','".$row['password']."','".$row['num_tel']."','".$row['post']."')";
   if(mysqli_query($con,$sql)){

    $query=" DELETE FROM `archive_compte_user` WHERE `archive_compte_user`.`id_arch` ='".$_GET['id']."';";
if(mysqli_query($con,$query))

{
   

   echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' >restauration effectuée avec succès </p>
   
   <a  href='archivecompte.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
   </div>";
}
   }else {
    echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' > compte était déjà restauré </p>
   
    <a  href='archivecompte.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
    
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