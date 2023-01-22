<html>
<head>
<title>centre coquette</title>
<link href="ajouterrepas.css" rel="stylesheet">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>


<?php
session_start();

require('database_connection.php');
$email= $_GET['email'] ;


if (isset($_POST['botaj'])){

 $tel=$_POST['tel'];
  if (preg_match('`[0-9]{8}`',$tel)){
if (isset($_POST['cure']) && isset($_POST['cure1'])  && isset($_POST['offre']) && isset($_POST['offre1']) ){
  $file=addslashes(file_get_contents($_FILES["img_fond"]["tmp_name"]));
  $file1=addslashes(file_get_contents($_FILES["img_cot"]["tmp_name"]));


  $sql15="SELECT * FROM fiche_patiente WHERE np_pat=".$_POST['np']." AND age_pat=".$_POST['age']." AND email_pat=".$_POST['email'].";";

  if($result15 = mysqli_query($con,$sql15) == false ||  mysqli_num_rows($result15)==0 ){
echo"houd";
 $req15="INSERT INTO fiche_patiente VALUES(0,'".$_POST['np']."', '".$_POST['age']."', '".$_POST['poids']."', '".$_POST['taille_v']."', '".$_POST['taille_h']."', '".$_POST['taille']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['tel']."', '".$_POST['oui']."', '$file', '$file1');";
if( mysqli_query($con,$req15)){
  echo"houd1";

  $req16="SELECT * FROM fiche_patiente WHERE np_pat='".$_POST['np']."' AND age_pat='".$_POST['age']."' AND email_pat='".$_POST['email']."';";
  if($result16 = mysqli_query($con,$req16) ){
    $row16=mysqli_fetch_assoc($result16);
    echo"houd2";
    $req17="INSERT INTO inscrit VALUES('".$row16['id_fiche']."', '".$_POST['cure1']."');";
   if( mysqli_query($con,$req17)){
    echo"houd3";
     $req18="INSERT INTO adhere VALUES( '".$_POST['offre1']."', '".$row16['id_fiche']."');";
    if( mysqli_query($con,$req18)){
        echo "<div class='forme1'></div><div class='message'>Ajout effectuer avec succès !</div>";

  }}

  }

 
}else { echo  "<div class='forme1'></div><div class='message'>Déja existe !</div>"; }
  }else { echo  "<div class='forme1'></div><div class='message'>erreur d'insertion !</div>"; }


}


if (isset($_POST['cure']) && isset($_POST['cure1'])  && !isset($_POST['offre']) && !isset($_POST['offre1']) ){
  $file=addslashes(file_get_contents($_FILES["img_fond"]["tmp_name"]));
  $file1=addslashes(file_get_contents($_FILES["img_cot"]["tmp_name"]));


  $sql15="SELECT * FROM fiche_patiente WHERE np_pat=".$_POST['np']." AND age_pat=".$_POST['age']." AND email_pat=".$_POST['email'].";";

  if($result15 = mysqli_query($con,$sql15) == false ||  mysqli_num_rows($result15)==0 ){
echo"houd";
 $req15="INSERT INTO fiche_patiente VALUES(0,'".$_POST['np']."', '".$_POST['age']."', '".$_POST['poids']."', '".$_POST['taille_v']."', '".$_POST['taille_h']."', '".$_POST['taille']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['tel']."', '".$_POST['oui']."', '$file', '$file1');";
if( mysqli_query($con,$req15)){
  echo"houd1";

  $req16="SELECT * FROM fiche_patiente WHERE np_pat='".$_POST['np']."' AND age_pat='".$_POST['age']."' AND email_pat='".$_POST['email']."';";
  if($result16 = mysqli_query($con,$req16) ){
    $row16=mysqli_fetch_assoc($result16);
    echo"houd2";
    $req17="INSERT INTO inscrit VALUES('".$row16['id_fiche']."', '".$_POST['cure1']."');";
   if( mysqli_query($con,$req17)){
   
        echo "<div class='forme1'></div><div class='message'>Ajout effectuer avec succès !</div>";

  }

  }

 
}else { echo  "<div class='forme1'></div><div class='message'>Déja existe !</div>"; }
  }else { echo  "<div class='forme1'></div><div class='message'>erreur d'insertion !</div>"; }


}
if (!isset($_POST['cure']) && !isset($_POST['cure1'])  && isset($_POST['offre']) && isset($_POST['offre1']) ){
  $file=addslashes(file_get_contents($_FILES["img_fond"]["tmp_name"]));
  $file1=addslashes(file_get_contents($_FILES["img_cot"]["tmp_name"]));


  $sql15="SELECT * FROM fiche_patiente WHERE np_pat=".$_POST['np']." AND age_pat=".$_POST['age']." AND email_pat=".$_POST['email'].";";

  if($result15 = mysqli_query($con,$sql15) == false ||  mysqli_num_rows($result15)==0 ){
echo"houd";
 $req15="INSERT INTO fiche_patiente VALUES(0,'".$_POST['np']."', '".$_POST['age']."', '".$_POST['poids']."', '".$_POST['taille_v']."', '".$_POST['taille_h']."', '".$_POST['taille']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['tel']."', '".$_POST['oui']."', '$file', '$file1');";
if( mysqli_query($con,$req15)){
  echo"houd1";

  $req16="SELECT * FROM fiche_patiente WHERE np_pat='".$_POST['np']."' AND age_pat='".$_POST['age']."' AND email_pat='".$_POST['email']."';";
  if($result16 = mysqli_query($con,$req16) ){
    $row16=mysqli_fetch_assoc($result16);

     $req18="INSERT INTO adhere VALUES( '".$_POST['offre1']."', '".$row16['id_fiche']."');";
    if( mysqli_query($con,$req18)){
        echo "<div class='forme1'></div><div class='message'>Ajout effectuer avec succès !</div>";

  }

  }

 
}else { echo  "<div class='forme1'></div><div class='message'>Déja existe !</div>"; }
  }else { echo  "<div class='forme1'></div><div class='message'>erreur d'insertion !</div>"; }


}

if (!isset($_POST['cure']) && !isset($_POST['cure1'])  && !isset($_POST['offre']) && !isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'> cure est obligatoire !</div>";

}


if (!isset($_POST['cure']) && isset($_POST['cure1'])  && isset($_POST['offre']) && !isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}


if (isset($_POST['cure']) && !isset($_POST['cure1'])  && !isset($_POST['offre']) && isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}

if (!isset($_POST['cure']) && isset($_POST['cure1'])  && isset($_POST['offre']) && isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}


if (isset($_POST['cure']) && !isset($_POST['cure1'])  && isset($_POST['offre']) && isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}



if (isset($_POST['cure']) && isset($_POST['cure1'])  && !isset($_POST['offre']) && isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}


if (isset($_POST['cure']) && isset($_POST['cure1'])  && isset($_POST['offre']) && !isset($_POST['offre1']) ){

  echo  "<div class='forme1'></div><div class='message'>viréfier votre cure !</div>";

}



  }else {
    echo "<div class='forme1'></div><div class='message'>vérifier la numéro de télèphone !</div>";
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




<a href="listefiche.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute; background-color: rgba(48, 20, 20, 0.329);  width:860px; height:1200px; left:4%; top:50px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:30%;">Ajouter fiche patiente</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

<label for="np_pat" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 25px;
color:white;
top:140px;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nom et prénom :</label> <br>
<input type="text" id="np" name="np" placeholder="Nom et prénom ..." 
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
REQUIRED ><br>
<label for="age"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 110px;
top:250px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Age :</label> <br>
<input type="number" min=0  max=60 id="nompre" name="age" placeholder="Age ..." style="
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
<input type="email" id="email" name="email" placeholder="Email..." style="
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


<label for="password"  style=" 
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
left: 200px;
color:white;
top:350px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Numéro téléphone :</label> <br>
<input type="number" id="tel" name="tel" placeholder="Numéro téléphone..." style="
font-size:16px;
 position:absolute;
 width:300px;
 color:maroon;
 height:40px;
top: 340px;
left:350px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>







<label for="poids"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:430px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Poids :</label> <br>
<input type="number" min=0   step="0.01" id="poids" name="poids" placeholder="Poids ..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 420px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>
<label for="taille"  style=" 
position:absolute;
font-size:18px; 
left: 490px;
color:white;
top:430px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Taille :</label> <br>
<input type="number" min=0  step="0.01" id="taille" name="taille" placeholder="Taille..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 420px;
color:maroon;
left:550px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>





<label for="taille_h"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 40px;
top:530px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Taille Hanche :</label> <br>
<input type="number" min=0 step="0.01" id="taille_h" name="taille_h" placeholder="taille Hanche ..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 520px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>
<label for="taille_v"  style=" 
position:absolute;
font-size:18px; 
left: 450px;
color:white;
top:530px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Taille ventre :</label> <br>
<input type="number" min=0 step="0.01" id="taille_v" name="taille_v" placeholder="Taille ventre..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 520px;
color:maroon;
left:550px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>



<laber for="img_font" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 160px;
font-size:18px;
top:620px;
font-weight: bold;
text-decoration: maroon wavy underline;
">Image fond :</label> <br>
<input type="file"  id="img_fond" name="img_fond" placeholder=" image fond ..." style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>




<laber for="img_cote" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 400px;
font-size:18px;
top:0px;
font-weight: bold;
text-decoration: maroon wavy underline;
">Image_cote_:</label> <br>
<input type="file"  id="img_cot" name="img_cot" placeholder=" image cote..." style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>




<fieldset style="width:600px; height:120px; left:-450px; position:absolute; top:100px;">
    <legend>S'inscrit :</legend>

    <input type="checkbox" id="cure" name="cure" value="cure" style="position:absolute; top:40px; left:130px;">
    <label for="cure" style="position:absolute; top:38px; left:160px;">Cure</label><br/>


    <select id="cure1" name="cure1"  style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 80px;
color:maroon;
left:50px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" >
<option value="" selected disabled hidden>choisir un cure ..</option>


<?php

$sql = "SELECT * FROM `cure_base` WHERE id_cure != 2;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['id_cure']."'>".$row['titre_cure']."</option>";
   $i++;
}
}
?>






</select><br>



    <input type="checkbox"  id="offre" name="offre" value="offre" style="position:absolute; top:40px; left:400px;">
    <label for="offre" style="position:absolute; top:38px; left:430px;">Offre</label><br/>


    <select id="offre1" name="offre1" default="choisir un offre .." style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 80px;
color:maroon;
left:320px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"  >
<option value="" selected disabled hidden>choisir un offre ..</option>


<?php

$sql = "SELECT * FROM `actualite_offre` WHERE id_off !=2 ;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['id_off']."'>".$row['titre_act']."</option>";
   $i++;
}
}
?>




</select><br>


  </fieldset>




  <fieldset style="width:600px; height:120px; left:-450px; position:absolute; top:300px;">
    <legend>Payer :</legend>

    <input type="radio" id="oui" name="oui" value="oui" style="position:absolute; left:150px; top:70px;" >
    <label for="oui" style="position:absolute; left:180px; top:68px;" >Oui</label><br/>

    <input type="radio" id="non" name="oui" value="non" style="position:absolute; left:400px; top:70px;"  >
    <label for="non"   style="position:absolute; left:430px; top:68px;" >Non</label><br/>

  </fieldset>



<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 500px;
left:-300px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Ajouter </button>



</form>    


</div>


<style>
legend {
    background-color: #000;
    color: #fff;
    padding: 3px 6px;

}

.output {
    font: 1rem 'Fira Sans', sans-serif;
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
