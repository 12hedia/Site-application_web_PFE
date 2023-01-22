<html>
<head>
<title>Centre coquette</title>
<link href="password.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="h1.jpg">
</head>
<body>
<?php
require('database_connection.php');
session_start();
$message="";

if (isset($_POST['password'])){
$email=$_GET['email'];
$password=$_POST['password'];
    $query = "SELECT * FROM `compte_user` WHERE email='".$email."' and password='".$password."'";
    if($result = mysqli_query($con,$query)){

  if($result==true || mysqli_num_rows($result)==1){
   $row=mysqli_fetch_assoc($result);
   $user=$row['nom_pre'];
   if($row['post']=="admin")
   {
    
  header("Location: session_admin.php?user=".$user."&email=".$_GET['email']."");

   }
   else
   {
       if($row['post']=="kine")
       {
        header("Location: session_kin.php?email=". $_GET['email'] ."&user=".$row['nom_pre']."");
       }
   }
   
  }
else{
    $message = "mot de passe est incorrect.";
    
  }
}

}
?>


<div id="connex"></div>

<a href="connexion.php"><div id="back"></div></a>
<div id="con">
<form action="" method="POST" name="password_con">
    <div id="logo_coq"></div>
    <div id="titre">Centre Coquette</div>
    <div id="titre_1">Entre le mot de passe</div>
    <div id="retoure">
      
     <label id="lab" name="lab"><?php echo $_GET['email'] ?></label>
    </div>
    <div id="inpute"> 
        <input type="password" name="password" id="email" placeholder="Votre mot de passe..." required/>
        <br>
        <p id="p"> <?php  echo $message  ?></p>
        <a id="oublie" href="">J'ai oublié mon mot de passe</a>
        
       <button id="bt_suiv">Se connecter</button>
    </div>
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