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
<h1 style="color:white; left:22%; position:absolute; ">Liste des patientes à consulter aujourd'hui</h1>
<form action="" method="POST" >
<input type="text" method="POST" name="recherche" style="position:absolute; left:10%; top:135px; width:750px; height:40px; border:none; border-radius:50px; font-size:22px; color:rgba(134, 47, 6, 0.486);"placeholder="Nom patiente…" />
</form> 

<?php 
$email= $_GET['email'] ;
require('database_connection.php');
$recherche="";
if( isset($_POST['recherche'])){

  $recherche= $_POST['recherche'];

  $sql = "SELECT * FROM rdv WHERE DATE(date_rdv) = CURDATE() ;";

  if($result = mysqli_query($con,$sql))
  {
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
      
    $req4="SELECT * FROM fiche_patiente WHERE id_fiche=".$row['id_fiche']." AND np_pat like '%$recherche%';";
      $result4 = mysqli_query($con,$req4); 
      $row4=mysqli_fetch_assoc($result4);
      echo "  <a href='consultation.php?id_fiche=".$row['id_fiche']."&id_rdv=".$row['id_rdv']."&email=".$email."' ><div id='nom' ><centre><h1 id='text'>".$row4['np_pat']. "</h1></centre></div></a>";
  
  
      $i++;
    }
  
  }
  else
  {
    http_response_code(404);
  }}
  
else {

$sql = "SELECT * FROM rdv WHERE DATE(date_rdv) = CURDATE() ;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    
  $req4="SELECT * FROM fiche_patiente WHERE id_fiche=".$row['id_fiche'].";";
    $result4 = mysqli_query($con,$req4); 
    $row4=mysqli_fetch_assoc($result4);
    echo "  <a href='consultation.php?id_fiche=".$row['id_fiche']."&id_rdv=".$row['id_rdv']."&email=".$email."' ><div id='nom' ><centre><h1 id='text'>".$row4['np_pat']. "</h1></centre></div></a>";


    $i++;
  }

}
else
{
  http_response_code(404);
}}

?>





<style>

a:link {
    text-decoration: none;
  }

#nom{
display:block;
position:relative;
color:white;
font-size:25px;
text-align: center;
width:700px;
height:80px;
left: 100px;
top:220px;
background-color: maroon;
border-radius:50px;

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