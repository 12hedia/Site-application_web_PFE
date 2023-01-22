<?php
require('database_connection.php');
$email= $_GET['email'] ;
session_start();
$query=" DELETE FROM `rdv` WHERE `rdv`.`id_rdv` ='".$_GET['id']."';";
 if(mysqli_query($con,$query)){

   
   
   echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' >supprimer avec succés </p>
   
   <a  href='listerdvajourd.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
   </div>";
  
   
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