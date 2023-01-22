<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>


<?php
require('database_connection.php');
$id=$_GET['id'] ;
session_start();
$email=$_GET['email'] ;

$query="SELECT * from actualite_centre where id_act_cent='".$id."';";
if($result=mysqli_query($con,$query)){
$row1=mysqli_fetch_assoc($result);

}

$sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result1 = mysqli_query($con,$sql))
{
    $row=mysqli_fetch_assoc($result1);

$cin= $row['cin'];


if (isset($_POST['botaj']) ){

$req="UPDATE actualite_centre SET titre_act='".$_POST['titre'] ."', descrip_act_cent='".$_POST['descrip'] ."', cin='".$cin."'  WHERE id_act_cent ='".$id."';";
if(mysqli_query($con,$req)){
    echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
}else{
    echo "<div class='forme1'></div><div class='message'> erreur de modification !</div>";
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

<a href="listeactualitecentre.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:90px;">Modifier actualité centre</h1>


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
<input type="text" id="titre" name="titre" placeholder="Titre d'actualité  ..." value="<?php echo $row1['titre_act'];?>"
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
<textarea id="descrip" name="descrip" placeholder="Description..." value="<?php echo $row1['descrip_act_cent'];?>" style="
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
" required><?php echo htmlspecialchars( $row1['descrip_act_cent']); ?>
</textarea><br>


<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 400px;
left:100px;
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
