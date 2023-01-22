<html>
<head>
<title>centre coquette</title>
<link href="ajouterrepas.css" rel="stylesheet">
</head>
<body>
<?php
session_start();

require('database_connection.php');
$email= $_GET['email'] ;






$id=$_GET['id'] ;
echo $id;

$query="SELECT * from fiche_patiente where id_fiche='".$id."';";
if($result=mysqli_query($con,$query)){
$row1=mysqli_fetch_assoc($result);

$query12="SELECT * from inscrit where id_fiche='".$id."';";
if($result12=mysqli_query($con,$query12)){
$row12=mysqli_fetch_assoc($result12);

$query13="SELECT * from cure_base where id_cure=".$row12['id_cure'].";";
if($result13=mysqli_query($con,$query13)){
  $row13=mysqli_fetch_assoc($result13);
  $var3=$row13['titre_cure'];
  $var4=$row13['id_cure'];
}else{
  $var3="choisir un cure ..";
  $var4="";
}

}

$query14="SELECT * from adhere where id_fiche='".$id."';";
if($result14=mysqli_query($con,$query14)){
$row14=mysqli_fetch_assoc($result14);


$query15="SELECT * FROM actualite_offre WHERE id_off =".$row14['id_off'];
if($result15=mysqli_query($con,$query15)){
  $row15=mysqli_fetch_assoc($result15);
  $var2=$row15['titre_act'];
  $var1=$row15['id_off'];
}else{
  $var2="choisir un offre ..";
  $var1="";
}



}

}





if (isset($_POST['botaj']) ){

  if(isset($_POST['oui'])){

    $file1=addslashes(file_get_contents($_FILES["img_fond"]["tmp_name"]));
  $file2=addslashes(file_get_contents($_FILES["img_cot"]["tmp_name"]));

$req="UPDATE fiche_patiente SET np_pat='".$_POST['np'] ."', age_pat='".$_POST['age'] ."', email_pat='".$_POST['email'] ."', password_pat='".$_POST['password'] ."', telephone='".$_POST['tel'] ."', poids_pat='".$_POST['poids'] ."', tail_h_pat='".$_POST['taille_h'] ."', tail_v_pat='".$_POST['taille_v'] ."', img_fond='$file1',  img_cot='$file2' , payer= '".$_POST['oui']."' WHERE id_fiche ='".$id."';";
if(mysqli_query($con,$req)){


  if(isset($_POST['cure1']) && $_POST['offre1']== "" && $_POST['cure1']!= ""){

    $reqcure="DELETE FROM inscrit Where id_fiche= ".$id;
    if(mysqli_query($con,$reqcure)){
      $reqcure12="DELETE FROM adhere Where id_fiche= ".$id;
      if(mysqli_query($con,$reqcure12)){
$reqc="INSERT INTO inscrit VALUES ('".$id."','".$_POST['cure1']."')";
if(mysqli_query($con,$reqc)){
echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
    }
    }else{
      $reqc="INSERT INTO inscrit VALUES ('".$id."','".$_POST['cure1']."')";
if(mysqli_query($con,$reqc)){
echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
    }
    }

}
  }
if(isset($_POST['offre1']) && $_POST['cure1']== "" && $_POST['offre1']!= "" ){

  $reqcure="DELETE FROM adhere Where id_fiche= ".$id;
  if(mysqli_query($con,$reqcure)){
    $reqcure13="DELETE FROM adhere Where id_fiche= ".$id;
    if(mysqli_query($con,$reqcure13)){
$reqc="INSERT INTO adhere VALUES ('".$_POST['offre1']."','".$id."')";
if(mysqli_query($con,$reqc)){
  echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
}
}else{
  $reqc="INSERT INTO adhere VALUES ('".$_POST['offre1']."','".$id."')";
if(mysqli_query($con,$reqc)){
  echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
}}

}

}



if(isset($_POST['offre1']) && $_POST['offre1']!= "" && isset($_POST['cure1']) && $_POST['cure1']!= ""  ){


    echo "<div class='forme1'></div><div class='message'> verifier le cure ou l'offre !</div>";
  

  
}








}else{
    echo "<div class='forme1'></div><div class='message'> erreur de modification !</div>";
}}

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
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:30%;">Modifier fiche patiente</h1>


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
<input type="text" id="np" name="np" placeholder="Nom et prénom ..." value="<?php echo $row1['np_pat'];?>"
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
<input type="number" min=0 id="nompre" name="age" placeholder="Age ..." value="<?php echo $row1['age_pat'];?>" style="
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
<input type="email" id="email" name="email" placeholder="Email..." value="<?php echo $row1['email_pat'];?>" style="
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
<input type="text" id="Password" name="password" value="<?php echo $row1['password_pat'];?>" style="
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
" required ><br>




<label for="num_tel"  style=" 
position:absolute;
font-size:18px; 
left: 200px;
color:white;
top:350px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Numéro téléphone :</label> <br>
<input type="number" id="tel" name="tel" value="<?php echo $row1['telephone'];?>"  placeholder="Numéro téléphone..." style="
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
<input type="number" min=0   step="0.01" id="poids" value="<?php echo $row1['poids_pat'];?>"  name="poids" placeholder="Poids ..." style="
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
<input type="number" min=0  step="0.01" id="taille" name="taille" value="<?php echo $row1['tail_pat'];?>" placeholder="Taille..." style="
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
<input type="number" min=0 step="0.01" id="taille_h" value="<?php echo $row1['tail_h_pat'];?>" name="taille_h" placeholder="taille Hanche ..." style="
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
<input type="number" min=0 step="0.01" id="taille_v" name="taille_v"  value="<?php echo $row1['tail_v_pat'];?>"  placeholder="Taille ventre..." style="
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
<input type="file"  id="img_fond" name="img_fond" value="<?php echo base64_encode($row1['img_fond']);?>" placeholder=" image fond ..." style="
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
<input type="file"  id="img_cot" name="img_cot" value="<?php echo base64_encode($row1['img_cot']);?>" placeholder=" image cote..." style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>




<fieldset style="width:600px; height:120px; left:-450px; position:absolute; top:100px;">
    <legend>S'inscrit :</legend>



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
<option value="<?php echo $var4 ?>" selected  ><?php echo $var3 ?></option>
<option value="" >choisir un cure ..</option>


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
">
<option value="<?php echo $var1 ?>" selected ><?php echo $var2 ?></option>
<option value="" >choisir un offre ..</option>

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
"   name="botaj" id="bot-aj">  Modifier </button>



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
