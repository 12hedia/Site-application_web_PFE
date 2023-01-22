<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>



<?php
session_start();
require('database_connection.php');
$id=$_GET['id'] ;

$email=$_GET['email'] ;

$query="SELECT * from equipement where code_eq='".$id."';";
if($result=mysqli_query($con,$query)){
$row1=mysqli_fetch_assoc($result);

}

$sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result1 = mysqli_query($con,$sql))
{
    $row=mysqli_fetch_assoc($result1);

$cin= $row['cin'];


if (isset($_POST['botaj']) ){

$req="UPDATE equipement SET nom_eq='".$_POST['nom_equip'] ."', marq_eq='".$_POST['mrq_eq'] ."', cin='".$cin."'  WHERE code_eq ='".$id."';";
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
<a href="listeequipement.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:90px;">Modifier équipement</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

    <label for="code_equip"  style=" 
position:absolute;
font-size:18px; 
left: 100px;
color:white;
top:80px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Code équipement :</label> <br>
<input type="text" id="code_equip" name="code_equip" placeholder="Code équipement ..." value="<?php echo $row1['code_eq'];?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 110px;
color:maroon;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required readonly><br>



<label for="nom_equip" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:170px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nom d'équipement :</label> <br>
<input type="text" id="nom_equip" name="nom_equip" placeholder="Nom d'équipement ..." value="<?php echo $row1['nom_eq'];?>"
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 200px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>
<label for="mrq_eq"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
top:270px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Marque  :</label> <br>
<input type="text" id="mrq_eq" name="mrq_eq" placeholder="Marque équipement..." value="<?php echo $row1['marq_eq'];?>" style="
font-size:16px;
 position:absolute;
 color:maroon;
 width:300px;
 height:40px;
top: 300px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>


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
"   name="botaj" id="bot-aj"> Modifier </button>



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
