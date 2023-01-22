
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
$email= $_GET['email'];
if (isset($_POST['patiente'])){
    $sql7="SELECT * FROM compte_user WHERE email='".$email."' ;";

    if($result7 = mysqli_query($con,$sql7))
    {
        $row7=mysqli_fetch_assoc($result7);
    
    $cin= $row7['cin'];}

$req9="SELECT * FROM rdv WHERE date_rdv='".$_POST['date']."' AND  heure_rdv='".$_POST['heure']."'  ;";
if($result9=mysqli_query($con,$req9)){

    if ($result9==false || mysqli_num_rows($result9)>0){
        echo "<div class='forme1'></div><div class='message'>Rendez-vous déja existe !</div>";;
    }
    if ($result9==true|| mysqli_num_rows($result9)==0){
  
       $sql5="INSERT INTO rdv VALUES(0,DATE('".$_POST['date']."'),TIME('".$_POST['heure']."'),'".$_POST['titre']."','".$cin."','".$_POST['patiente']."')";
        if(mysqli_query($con,$sql5)){
           $requet="SELECT * FROM rdv WHERE date_rdv=DATE('".$_POST['date']."') AND heure_rdv= TIME('".$_POST['heure']."') AND titre_rdv='".$_POST['titre']."' AND cin ='".$cin."' AND id_fiche='".$_POST['patiente']."';";
           if($resultat=mysqli_query($con,$requet)){
            $row8=mysqli_fetch_assoc($resultat);

            header("Location: ajouterrdv.php?id_rdv='".$row8['id_rdv']."'&email=".$_GET['email']."&date=".$_GET['date']."&id_fiche='".$row8['id_fiche']."'");


           }
        
        }else{
            echo " ";
        }
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



<?php



   
 function lead($b){  

if(isset($_POST['patiente'])){
    $var1=$b;
echo $var1;
}



 }


?>

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



<input type="time" min="08:00" max="18:00" id="heure" name="heure"  style="
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
<input type="text" id="titre" name="titre" placeholder="Titre de rendez-vous  ..." 
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
 width:250px;
 height:40px;
top: 300px;
color:maroon;
left:150px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required >
<option value="" selected disabled hidden>Choisir le nom de patiente...</option>

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

<input type="hidden" id="idp" name="id_patiente"  ><br>

<button  name="btseanc" id="showVal" style="position:absolute; background:url(arrow_down_icon_128951.ico); background-repeat:round; width:30px; height:30px; top:305px; left:400px" ></button>




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


