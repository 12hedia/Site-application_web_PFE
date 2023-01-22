
<?PHP  require('database_connection.php'); ?>
<html>
<head>
<title></title>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<link href=".css" rel="stylesheet">
</head>
<body>

<?php
$email= $_GET['email'];
session_start();
$req2="SELECT * FROM rdv WHERE id_rdv=".$_GET['id'].";";
if($result2=mysqli_query($con,$req2)){
    $row2=mysqli_fetch_assoc($result2);
    
    }
    
    $sql3="SELECT * FROM fiche_patiente WHERE id_fiche=".$row2['id_fiche'].";";
    if($result3 = mysqli_query($con,$sql3)){
    
    $row3=mysqli_fetch_assoc($result3);
    
    }
    
    $sql4="SELECT * FROM compte_user WHERE email='".$email."';";
    if($result4 = mysqli_query($con,$sql4)){
    
    $row4=mysqli_fetch_assoc($result4);
    
    }
    

if (isset($_POST['botaj'])){

    $req="UPDATE rdv SET heure_rdv=TIME('".$_POST['heure'] ."'), titre_rdv='".$_POST['titre'] ."', id_fiche='".$_POST['patiente']."' , cin='".$row4['cin']."' WHERE id_rdv='".$_GET['id']."';";
    if(mysqli_query($con,$req)){
        echo "<div class='forme1'></div><div class='message'> modification avec succée !</div>";
        header("Location: listerdv.php?id=".$row['id_rdv']."&email=".$email."&date=".$_GET['date']." ");
    }else{
      echo "<div class='forme1'></div><div class='message'> Rendez-vous déja existe!</div>";
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
    top:30px;
}
.message{

    position:absolute;
    width:250px;
    height:40px;
    background:maroon;
    color:white;
    font-size:18px;
    top:0px;
border-radius:10px;
right:20px;
}

</style>




<div id="container" name="container" style="position: absolute; background-color: rgba(48, 20, 20, 0.329); border : 0.5px solid rgba(48, 20, 20, 0.329) ;width:350px; height:650px; left:0%; top:0px;">

<h1 id="titre" style="color: white; font-size:30px; position: absolute; left:9%;"> Modifier rendez-vous </h1>


<form action=""  id="f1" method="POST" >

<label for="date" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 30px;
top:110px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >   Date   :  </label>


<input value="<?php echo $_GET['date']; ?>" id="date" name="date"  style="
font-size:16px;
 position:absolute;
 width:200px;
 height:40px;
 color:maroon;
top: 100px;
left:110px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required readonly>





<label for="heure" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 20px;
top:180px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >Heure   :  </label>



<input type="time" min="08:00:00" max="18:00:00" value="<?php echo $row2['heure_rdv']; ?>" id="heure" name="heure"  style="
font-size:16px;
 position:absolute;
 width:200px;
 height:40px;
 color:maroon;
top: 170px;
left:110px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required>



<label for="titre" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 30px;
top:240px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Titre :</label> <br>
<input type="text" id="titre"  value="<?php echo $row2['titre_rdv']; ?>" name="titre" placeholder="Titre de rendez-vous  ..." 
style="
font-size:16px;
 position:absolute;
 width:200px;
 height:40px;
 color:maroon;
top: 240px;
left:110px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>

<label for="patiente" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 10px;
top:310px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >Patiente :</label> <br>
<select id="patiente" name="patiente"   style="
font-size:16px;
 position:absolute;
 width:200px;
 height:40px;
top: 300px;
color:maroon;
left:110px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >
<option value="<?php echo $row3['id_fiche']; ?>" selected ><?php echo $row3['np_pat']; ?></option>

<?php

$sql = "SELECT * FROM `fiche_patiente`;";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
 
  while($row = mysqli_fetch_assoc($result))
{
   echo "<option value='".$row['id_fiche']."'>".$row['np_pat']."</option>";
   $i++;
}
}
?>
</select>

<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 500px;
left:20px;
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


