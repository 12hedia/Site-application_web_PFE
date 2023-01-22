
<?php
require('database_connection.php');
$email= $_GET['email'] ;
$id= $_GET['id'] ;
session_start();

$req="SELECT * FROM fiche_patiente WHERE id_fiche='".$_GET['id']."';";

if($result1 = mysqli_query($con,$req)){
$row = mysqli_fetch_assoc($result1);

$file1=$row['img_fond'];
$file11=addslashes($file1);
$file2=$row['img_cot'];
$file22=addslashes($file2);
  $req1="INSERT INTO  archive_fiche_patiente VALUES (0,'".$row['id_fiche']."','".$row['np_pat']."','".$row['age_pat']."','".$row['poids_pat']."','".$row['tail_v_pat']."','".$row['tail_h_pat']."','".$row['tail_pat']."' ,'".$row['email_pat']."' ,'".$row['password_pat']."' ,'".$row['telephone']."' ,'".$row['payer']."' ,'$file11', '$file22',  CURDATE())";
 if(mysqli_query($con,$req1)){
  
$query=" DELETE FROM `fiche_patiente` WHERE `fiche_patiente`.`id_fiche` ='$id';";
 if(mysqli_query($con,$query)){

   
   
echo "<div style=' position: absolute; background:maroon; width:500px; height:150px; top:250px; left:200px; color: white; font-weight: bold; font-size:32px; ' > <p style='position:absolute; left:100px;' > compte était archivé avec succès </p>
   
 <a  href='listefiche.php?email=".$email."'   style='position:absolute; top:59px; left:200px'>  retours  </a>
   
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