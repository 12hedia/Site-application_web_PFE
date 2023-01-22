
<?PHP  require('database_connection.php'); ?>
<html>
<head>
<title></title>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<link href=".css" rel="stylesheet">
</head>
<body>

<?php
session_start();
try {
$email= $_GET['email'];

$sql="SELECT * FROM rdv WHERE id_rdv=".$_GET['id_rdv'].";";
if($result = mysqli_query($con,$sql)){
$row =mysqli_fetch_assoc($result);
$titre= $row['titre_rdv'];

}
$sql1="SELECT * FROM fiche_patiente WHERE id_fiche=".$_GET['id_fiche'].";";
if($result1 = mysqli_query($con,$sql1)){

$row1=mysqli_fetch_assoc($result1);

}


if (isset($_POST['botaj'])){

    $req11="SELECT * FROM inscrit WHERE id_fiche=".$_GET['id_fiche'].";";
    if($result11 = mysqli_query($con,$req11))
    {
        $row11 = mysqli_fetch_assoc($result11);
    
        $req12="SELECT count(*)  AS total FROM seance WHERE id_cure=".$row11['id_cure'].";";
        if($result12 = mysqli_query($con,$req12)){
$row12= mysqli_fetch_assoc($result12);
$nb_tot=$row12['total'];
    
    for ($i=0; $i< $nb_tot ; $i++ ){
if (isset(  $_POST["c".$i.""])){

    $req10="INSERT INTO constitue VALUES (0, ".$_GET['id_rdv']." , ".$_POST["c".$i.""]." );";
   if(mysqli_query($con,$req10)){

   }else {
echo "";

   }
}

    } echo "<div class='forme1'></div><div class='message'> Ajout avec succée !</div>";


}  else{
    $req11="SELECT * FROM adhere WHERE id_fiche=".$_GET['id_fiche'].";";
    if($result11 = mysqli_query($con,$req11))
    {
        $row11 = mysqli_fetch_assoc($result11);
    
        $req12="SELECT count(*)  AS total FROM seance WHERE id_off=".$row11['id_off'].";";
        if($result12 = mysqli_query($con,$req12)){
$row12= mysqli_fetch_assoc($result12);
$nb_tot=$row12['total'];
    
    for ($i=0; $i< $nb_tot ; $i++ ){
if (isset(  $_POST["c".$i.""])){

    $req10="INSERT INTO constitue VALUES (0, ".$_GET['id_rdv']." , ".$_POST["c".$i.""]." );";
   if(mysqli_query($con,$req10)){

   }else {
echo "";

   }
}

    } echo "<div class='forme1'></div><div class='message'> Ajout avec succée !</div>";
        }}







}  



}



}    }


catch (Exception $e) {
    
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

<a href="calendrier.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10;" > </div> </a>


<div  id="container" name="container" style="position: absolute; background-color: rgba(48, 20, 20, 0.329);  width:860px; height:650px; left:4%; top:50px;">  
<div id="container" name="container" style="position: absolute; background-color: rgba(48, 20, 20, 0.329); border : 0.5px solid rgba(48, 20, 20, 0.329) ;width:500px; height:650px; left:42%; top:0px;">

<h1 id="titre" style="color: white; font-size:38px; position: absolute; left:21%;"> Gérer rendez-vous </h1>


<form action=""  id="f1" method="POST" >

<label for="date" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 70px;
top:110px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >   Date   :  </label>


<input value="<?php echo $_GET['date']; ?>" id="date" name="date"  style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 100px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required readonly>





<label for="heure" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 60px;
top:180px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >Heure   :  </label>



<input type="time" min="08:00:00" value="<?php echo $row['heure_rdv']; ?>" max="18:00:00" id="heure" name="heure"  style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 170px;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required>



<label for="titre" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 70px;
top:240px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Titre :</label> <br>
<input type="text" id="titre" value="<?php echo $row['titre_rdv']; ?>" name="titre" placeholder="Titre de rendez-vous  ..." 
style="
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
"

REQUIRED><br>

<label for="patiente" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 50px;
top:310px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" >Patiente :</label> <br>
<select id="patiente" name="patiente"   style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 300px;
color:maroon;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >
<option value="<?php echo $row1['id_fiche']; ?>" selected><?php echo $row1['np_pat']; ?></option>

<?php

$sql5 = "SELECT * FROM `fiche_patiente`;";

if($result5 = mysqli_query($con,$sql5))
{
  $i = 0;
 
  while($row5 = mysqli_fetch_assoc($result5))
{
   echo "<option value='".$row5['id_fiche']."'>".$row5['np_pat']."</option>";
   $i++;
}
}
?>
</select>

<fieldset id="fieldset" style="width:380px; height:200px; left:50px; position:absolute; top:350px;">
    <legend>Séances :</legend>
<table> <tr>

<?php

$req9="SELECT * FROM inscrit WHERE id_fiche=".$_GET['id_fiche'].";";
if($result9 = mysqli_query($con,$req9))
{
    $row9 = mysqli_fetch_assoc($result9);

    $req7="SELECT * FROM seance WHERE id_cure=".$row9['id_cure'].";";
    if($result7 = mysqli_query($con,$req7)){

        $i = 0;
        
        while($row7 = mysqli_fetch_assoc($result7))
      {
       
         echo "<td><tr><input type='checkbox' id='check".$i."' name='c".$i."' value='".$row7['id_seance']."'></tr></td>";
         echo "<td><tr><label for='check".$i."' style='font-size:20px; color:white;'> ".$row7['type_sean']."</tr></td>";
         $i++;
      }


}else{
    $req9="SELECT * FROM adhere WHERE id_fiche=".$_GET['id_fiche'].";";
if($result9 = mysqli_query($con,$req9))
{
    $row9 = mysqli_fetch_assoc($result9);

    $req7="SELECT * FROM seance WHERE id_off=".$row9['id_off'].";";
    if($result7 = mysqli_query($con,$req7)){

        $i = 0;
        
        while($row7 = mysqli_fetch_assoc($result7))
      {
       
         echo "<td><tr><input type='checkbox' id='check".$i."' name='c".$i."' value='".$row7['id_seance']."'></tr></td>";
         echo "<td><tr><label for='check".$i."' style='font-size:20px; color:white;'> ".$row7['type_sean']."</tr></td>";
         $i++;
      }
    }
}
}

}

?>

</tr>
</table>


</fieldset>

<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 580px;
left:150px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Ajouter </button>




</form>

<div>
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


<a href=""></a>
<iframe src="listerdv.php?email=<?php echo $_GET['email'] ?>&date=<?php echo $_GET['date']; ?>" name="container" style="position:absolute;left:-360px;top:0px; padding:0px; border:2px solid rgba(48, 20, 20, 0.329) ; margin:0px;" width="71%" height="99.1%"></iframe>

</body>

</html>


