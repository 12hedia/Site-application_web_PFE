<?php
require('database_connection.php');
$email= $_GET['email'] ;

session_start();


$req="SELECT *FROM compte_user WHERE cin=".$_GET['cin'];

$result1 = mysqli_query($con,$req);

$row = mysqli_fetch_assoc($result1);
  $req1="INSERT INTO archive_compte_user VALUES (0,'".$row['cin']."','".$row['nom_pre']."','".$row['email']."','".$row['password']."','".$row['num_tel']."','".$row['post']."', CURDATE())";
 if(mysqli_query($con,$req1)){

$query=" DELETE FROM `compte_user` WHERE `compte_user`.`cin` =".$_GET['cin'];
$result = mysqli_query($con,$query);
if ($result){
   
   
echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' > compte était archivé avec succès </p>
   
 <a  href='listecompte.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
</div>";
  
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