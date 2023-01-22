<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
<link href="listerepas.css" rel="stylesheet">
<meta charset="UTF-8">
<meta charset="UTF-8">
</head>
<body>



<?php 
session_start();
$email= $_GET['email'];
require('database_connection.php');
try{
    if (isset($_POST['botaj']) ){

    //    $file_name=$_FILES['img_rep']['name'];
     //   $file_extension=strchr($file_tmp_name, '.');
      //  $file_tmp_name =$_FILES['img_rep']['tmp_name'];
       // $file_dist= 'photo/'.$file_name ;
      //  move_uploaded_file($file_tmp_name, $file_dist);
    $sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

    if($result = mysqli_query($con,$sql))
    {
        $row=mysqli_fetch_assoc($result);
        
    $cin= $row['cin'];


$file=addslashes(file_get_contents($_FILES["img_rep"]["tmp_name"]));

    $query="INSERT INTO `repas`
 VALUES (0,'".$_POST['nomrep'] ."','".$_POST['calor'] ."','".$_POST['qte']."','$file','".$cin."')";
 
  if(  $result = mysqli_query($con,$query))
{



    echo "bien inserer";
}
else {echo "errer ";}
    }
}
}


catch (Exception $e){
echo "houdhoud" ;
}
?>

<a href="listeactualiteoffre.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:800px; height:950px; left:10%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:200px;">Ajouter actualité offre</h1>


    <form action="" method="POST" enctype="multipart/form-data" >




<label for="titre" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 40px;
top:140px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Titre :</label> <br>
<input type="text" id="titre" name="titre" placeholder="Titre d'actualité  ..." 
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 130px;
left:90px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>


<label for="prix" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 410px;
top:140px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Prix :</label> <br>
<input type="number" min=0 step="0.01" id="prix" name="prix" placeholder="Prix actualité  ..." 
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 130px;
left:460px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>

<laber for="img_act" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 240px;
font-size:18px;
top:180px;
font-weight: bold;
text-decoration: maroon wavy underline;
">Image actualité :</label> <br>
<input type="file"  id="img_act" name="img_act" style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>


<fieldset style="width:700px; height:550px; left:-200px; position:absolute; top:60px;">
    <legend>Séances :</legend>



    <label for="nb_seance" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 20px;
top:50px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nombre de séance :</label> <br>
<input type="number" min=0 id="nb_seance" name="nb_seance" placeholder="Nombre séance ..." 
style="
font-size:16px;
 position:absolute;
 width:150px;
 height:40px;
 color:maroon;
top: 40px;
left:170px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>





<label for="type_seance" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 370px;
top:50px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Séances :</label> <br>
<select id="type_seance" name="type_seance"  default="choisir un type .." style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 40px;
color:maroon;
left:450px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >
<option value="" selected disabled hidden>choisir un type ..</option>

<?php

$sql = "SELECT * FROM `type_seance`;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['type_sean']."'>".$row['type_sean']."</option>";
   $i++;
}
}
?>




</select><br>





<label for="nb_seance" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 150px;
top:110px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Durée  :</label> <br>
<select id="duree" name="duree"  default="choisir un type .." style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 100px;
color:maroon;
left:210px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >
<option value="" selected disabled hidden>choisir la durée ..</option>

<?php

$sql = "SELECT * FROM `activite` ORDER BY duree ASC;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['id_activite']."'>".$row['duree']." minutes</option>";
   $i++;
}
}
?>




</select><br>


<button  id="modifier" name="modifier" Onclick="<?php ajouter(); ?>"  style="position:absolute; left:570px; top:100; width:30px; height:50px; background:url(-arrow-upward_90006.ico); background-repeat:round;" ></button>
<button  id="ajouter" name="ajouter" onclick="<?php  ?>"  style="position:absolute; left:530px; top:100;  width:30px; height:50px; background:url(arrow_down_icon_128951.ico); background-repeat:round;" ></button>

<?php 
function ajouter (){

if (isset($_POST['ajouter'])){

    
 $id_activite= $_POST['duree'] ;
 $id_type_seance= $_POST['type_seance'] ;
 $id_activite= $_POST['nb_seance'] ;
 $n=30 ;
  $table = array () ;
  while ($i<=30);
  {
    
  }

}

}

?>
<center> <table style="position:absolute; left:150px; top:200px;"> 
<th>Nombre séance</th>
<th>Séances</th>
<th>Durée</th>
<th>Annuler</th>

</table></center> 




  </fieldset>





<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 680px;
left:0px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Publier </button>



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
