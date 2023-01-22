<html>
<head>
<title>Centre coquette</title>
<link href="connexion.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="h1.jpg">
</head>
<body>

<?php



require('database_connection.php');
session_start();
$message="";
$email="";
if (isset($_POST['email'])){

    $query = "SELECT * FROM `compte_user` WHERE email='".$_POST['email']."' ";
  $result = mysqli_query($con,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
   
   
      header("Location: password.php?email=". $_POST['email'] ."");
     
    
  }else{
    $message = "L'email est incorrect.";
  }
}
?>


<div id="connex"></div>

<a href="index.php"><div id="back"></div></a>

<div id="con">
<form method="POST" action="" name="email_con">
    <div id="logo_coq"></div>
    <div id="titre">Centre Coquette</div>
    <div id="titre_1">Se connecter</div>
    <div id="inpute"> 
        <input type="email" name="email" id="email" placeholder="Votre adresse Email..." required/>
        <br>
<p id="p"> <?php  echo $message  ?></p>
<p id="pi" name="rec_email"> <?php  echo $email ?></p>
        <button id="bt_suiv">Suivante</button>
    </div>

</div>
</form>

<script>
function recup_email(){
  email=document.getElementById("email").value;
    
  document.forms["password_con"].querySelector("#lab").innerHTML= email;
}
</script>
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