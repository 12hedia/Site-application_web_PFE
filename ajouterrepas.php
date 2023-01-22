<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
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
//selectionner id repas pour insere un ligne dans le table type_repas !!!!!!!!!!!!
$sql1="SELECT id_rep FROM repas WHERE  nom_rep='".$_POST['nomrep'] ."' AND calor_rep='".$_POST['calor'] ."' AND qte_rep='".$_POST['qte']."' ;";
if($result1 = mysqli_query($con,$sql1)) {
$row1=mysqli_fetch_assoc($result1);
$id_repas= $row1['id_rep'];
$query1="INSERT INTO `garde`
VALUES ('".$id_repas."', '".$_POST['type_rep']."')";
$result2 = mysqli_query($con,$query1);

echo "<div class='forme1'></div><div class='message'> ajout avec succée !</div>";

}else { echo"verfier";}

  
}
else {echo "errer ";}
    }}

}


catch (Exception $e){
echo "houdhoud" ;
}
?>

<a href="listerepas.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:150px;">Ajouter repas</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

<label for="nom_repas" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:70px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nom repas :</label> <br>
<input type="text" id="nom_repas" name="nomrep" placeholder="Nom repas ..." 
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 100px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>
<label for="qte_rep"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
top:160px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Quantité repas :</label> <br>
<input type="text" id="qte_rep" name="qte" placeholder="Quantité repas..." style="
font-size:16px;
 position:absolute;
 color:maroon;
 width:300px;
 height:40px;
top: 190px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>
<label for="cal_rep"  style=" 
position:absolute;
font-size:18px; 
left: 100px;
color:white;
top:260px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Calories repas :</label> <br>
<input type="number" id="cal_rep" name="calor" min="0" placeholder="Calorie repas..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 290px;
color:maroon;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>

<label for="type_rep"  style=" 
position:absolute;
font-size:18px; 
left: 100px;
color:white;
top:360px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> type repas :</label> <br>
<select id="cal_rep" name="type_rep"  default="choisir un type .." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 390px;
color:maroon;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >

<option value="" selected disabled hidden>choisir un type ..</option>
<?php

$sql = "SELECT type_rep FROM `type_repas`;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['type_rep']."'>".$row['type_rep']."</option>";
   $i++;
}
}
?>




</select><br>

<laber for="img_rep" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
font-size:18px;
top:460px;
font-weight: bold;
text-decoration: maroon wavy underline;
">Image repas :</label> <br>
<input type="file"  id="img_rep" name="img_rep" placeholder=" image repas ..." style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>
<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 80px;
left:0px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Ajouter </button>



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
</body>
</html>
