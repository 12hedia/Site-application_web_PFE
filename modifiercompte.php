<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
require('database_connection.php');
$id=$_GET['cin'];
$query="SELECT * from compte_user where cin=".$id.";";
if($result=mysqli_query($con,$query)){
$row1=mysqli_fetch_assoc($result);

}


if (isset($_POST['botaj']) ){
    $tel=$_POST['tel'];
    if (preg_match('`[0-9]{8}`',$tel) ){

    $req="UPDATE compte_user SET nom_pre='".$_POST['nompre'] ."', email='".$_POST['email'] ."', num_tel='".$_POST['tel']."' WHERE cin =".$id.";";
    if(mysqli_query($con,$req)){
        echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
    }else{
        echo "<div class='forme1'></div><div class='message'> erreur de modification !</div>";
    }
    }
    }

function CarAleatoire()
{
  // Liste des caractères possibles
  $cars="azertyiopqsdfghjklmwxcvbn0123456789";
  $mdp='';
  $long=strlen($cars);
  $taille=10;
  srand((double)microtime()*1000000); 
  //Initialise le générateur de nombres aléatoires

  for($i=0;$i<$taille;$i++)$mdp=$mdp.substr($cars,rand(0,$long-1),1);

  return $mdp;
}



?>
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

</style>

<a href="listecompte.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute; background-color: rgba(48, 20, 20, 0.329);  width:860px; height:600px; left:4%; top:50px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:40%;">Modifier user</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

<label for="cin" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
color:white;
top:140px;
font-weight: bold;
text-decoration: maroon wavy underline;
" > CIN :</label> <br>
<input type="number" id="cin" name="cin" placeholder="Cin ..." value="<?php echo $row1['cin'];?>"
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 130px;
left:150px;
color:maroon;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"
REQUIRED readonly><br>
<label for="nompre"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 20px;
top:250px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Nom et prénom :</label> <br>
<input type="text" id="nompre" name="nompre" placeholder="Nom et prénom ..."  value="<?php echo $row1['nom_pre'];?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 240px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>
<label for="email"  style=" 
position:absolute;
font-size:18px; 
left: 480px;
color:white;
top:140px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Email :</label> <br>
<input type="email" id="email" name="email" placeholder="Email..."  value="<?php echo $row1['email'];?>"style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 130px;
color:maroon;
left:550px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>


<label for="cal_rep"  style=" 
position:absolute;
font-size:18px; 
left: 460px;
top:250px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Password :</label> <br>
<input type="text" id="Password" name="password" value="<?php   echo CarAleatoire(); ?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 240px;
left:550px;
color:maroon;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
color:red;
" readonly ><br>




<label for="num_tel"  style=" 
position:absolute;
font-size:18px; 
left: 0px;
color:white;
top:350px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Numéro téléphone :</label> <br>
<input type="number" id="tel" name="tel" placeholder="Numéro téléphone..." value="<?php echo $row1['num_tel'];?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 color:maroon;
 height:40px;
top: 340px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>


<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 480px;
left:300px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Modifier </button>



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
