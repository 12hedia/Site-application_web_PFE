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

$sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result1 = mysqli_query($con,$sql))
{
    $row=mysqli_fetch_assoc($result1);

$cin= $row['cin'];}

if (isset($_POST['botaj']) ){
    
    $titre=$_POST['titre'];
$descrip=$_POST['descrip'];

$file=addslashes(file_get_contents($_FILES["img_act"]["tmp_name"]));



$req="SELECT * FROM actualite_centre WHERE titre_act ='".$titre."' AND descrip_act_cent='".$descrip."' ;";
if($result = mysqli_query($con,$req) == true || mysqli_num_rows($result)==0 ){
  
        $query="INSERT INTO `actualite_centre`
        VALUES (0,'".$titre."','".$descrip."','$file','".$cin."')";
      
         if(  $result2 = mysqli_query($con,$query)){
             echo "<div class='forme1'></div><div class='message'>ajout effectuer avec succées !</div>";
         }else {
            echo "<div class='forme1'></div><div class='message'>déja existe!</div>";
      } 
}
        

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

<a href="listeactualitecentre.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:90px;">Ajouter actualité centre</h1>


    <form action="" method="POST" enctype="multipart/form-data" >




<label for="titre" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:120px;
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
top: 150px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>
<label for="descrip"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
top:210px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Description :</label> <br>
<textarea id="descrip" name="descrip" placeholder="Description..." style="
font-size:16px;
 position:absolute;
 color:maroon;
 width:300px;
 height:120px;
top: 240px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required>
</textarea><br>


<laber for="img_act" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
font-size:18px;
top:400px;
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
"   name="botaj" id="bot-aj">  Publier </button>



</form>    




</div>


</body>
</html>
