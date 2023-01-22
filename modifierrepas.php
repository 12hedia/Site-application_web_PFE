<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
</head>
<body>
<?php

session_start();
require('database_connection.php');
$id=$_GET['id_rep'] ;
$email=$_GET['email'] ;

$query="SELECT * from repas where id_rep=".$id.";";
$result=mysqli_query($con,$query);
$row1=mysqli_fetch_assoc($result);
$id_rep=$row1['nom_rep'] ;


$sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

if($result = mysqli_query($con,$sql))
{
    $row=mysqli_fetch_assoc($result);

$cin= $row['cin'];


if (isset($_POST['botaj']) ){


$req="UPDATE repas SET nom_rep='".$_POST['nomrep'] ."', calor_rep='".$_POST['calor'] ."', qte_rep='".$_POST['qte']."' , cin='".$cin."'  WHERE id_rep =".$id.";";
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
<a href="listerepas.php?email=<?php echo $_GET['email'] ?>"> <div id="im" style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute;  width:500px; height:600px; left:25%; top:40px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:130px;">Modifier repas</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

<label for="nom_repas" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:80px;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nom repas :</label> <br>
<input type="text" id="nom_repas" name="nomrep" value="<?php echo $row1['nom_rep'];?>" 
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 110px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"
required><br>
<label for="qte_rep"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:170px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Quantité repas :</label> <br>
<input type="text" id="qte_rep" name="qte" value="<?php echo $row1['qte_rep'];?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 200px;
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
top:270px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Calories repas :</label> <br>
<input type="number" id="cal_rep" name="calor" value="<?php echo $row1['calor_rep'];?>" style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 300px;
left:100px;
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
top: 380px;
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
