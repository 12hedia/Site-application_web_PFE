
<?php
if (isset($_POST['bt_envoyer'])){

$from =$_POST['email'];
$nom =$_POST['nompre'];

if(mail('coquettecentre88@gmail.com','qesution de hedia', 'hi hedia !sdjqj ' ,'From: hediasmida2@gmail.com')){


    echo "<h1> votre email est bien envoyer ! </h1>";
}else{

    echo "<h1> ressayer ! </h1>";
}

}


?>




<html>
<head>
<title>Centre coquette</title>
<link href="contact.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="h1.jpg">
</head>
<body>
<div id="tete">
    <div class="h" id="ico"></div>
    <div class="h" id="actualite">    <a href="index.php" >Accueil</a> </div> 
    <div class="h" id="nouveaute"><a href="nouveaute.php" >Nouveauté</a></div>
    <div class="h " id="contact">  <a href="contact.php" id="cont">contact</a> </div>
    <div class="h" id="repas" style="
        top: 10px;
        left: 350px;
        width: 160px;
        height: 50px;
    ">  <a href="rechercherrepas.php" >Calories repas</a> </div>
    <div class="h" id="connexion"><a href="connexion.php"><img src="hedia.ico" width="40px" height="40px"></a></div>
</div>
<div id="img">
    <p id="titre">Bienvenue dans Centre Coquette</p>
    <a href="connexion.php"><button id="bconx">Connexion</button></a>
</div>
<a href="#cot1"><div id="ann"><centre><img src="down_icon-icons.com_66710.ico" width="69px" height="60px" position="absolute" left="15px"> </centre></div></a>
<div id="bloc"></div>
<div id="cot1"  style="position: relative;
widows: 500px;
height: 10px;
background-color:white;
border-radius: 10px;
top: 670px;
left: 0px;"></div>


<div style="position: relative;
widows: 500px;;
height: 600px;
background-color:white;
border-radius: 10px;
border:black solid;
top: 680px;
left: 10px;" >  

<div style="background:url(contact-us.jpg); width:900px; height:600px;border-radius: 5px;" > </div>

<div style="position:absolute; width:360px; background-color:white; left:900px; height: 600px; top:0px; border-radius: 10px;"> 
<h1 style="font-family:serif; position:absolute; left:25%;" >contactez nous</h1>
<form action="" method="POST" >
 <label for="nompre" style="position:absolute; color:black; top:120px; left:30px; font-family:arial; font-size:14px;" > Nom et prenom :  </label> <br>
 <input type="text" id="nompre" name="nompre" placeholder="Entrez votre nom et prénom..." style="position:absolute; border-left:none; border-top:none; width:300px; height:40px; left:30px; border-color:pink; top:150px; ;color:	#DC143C; font-size:18px; background-color:#FFEBCD;" required><br>

 <label for="email" style="position:absolute; color:black; top:220px; left:30px; font-family:arial; font-size:14px;"> Email:  </label> <br>
 <input type="email" id="email"name="email" placeholder="Entrez votre email..." style="position:absolute; border-left:none; border-top:none; width:300px; height:40px; left:30px; border-color:pink; top:250;;color:	#DC143C;font-size:18px; background-color:	#FFEBCD;" required><br>

 <label for="message" style="position:absolute; color:black; top:320px; left:30px; font-family:arial; font-size:14px;" > Message :  </label> <br>
 <textarea rows="4" cols="50" id="message" name="message" placeholder="Entrez votre message..." form="usrform" style="position:absolute; border-left:none; border-top:none; width:300px; height:100px; left:30px; border-color:pink; top:350px;color:	#DC143C; font-size:18px; background-color:	#FFEBCD" required>
</textarea>
<br>
<button name="bt_envoyer" style="position:absolute; border:none; width:300px; height:40px; left:30px; background-color: pink; color: white; top:500px; ;color:	#DC143C; border-radius:10px; font-size:18px; ">
    Envoyer
</button>
</form>
<a href="https://www.facebook.com/messages/t/centrecoquette" style="position:absolute; top:550px; left:60px;" >contactez-nous sur facebook ...</a>
</div>

</div>


<div class="piedpage">

    <div class="pied" ><a href="https://www.facebook.com/centrecoquette/?ref=br_rs"><div id="face"></div></a></div>
    <div  class="pied" id="resp"> <h3>Responsable de centre : Mme Wafe Fekih Chammem </h3> </div>
    <div  class="pied" id="adr"><h3> Siege social : KasrHelal, Monastir à coté de restaurant Copa Gabana au-dessus de Lamia Ayed 2ème étage.</h3></div>
    <div  class="pied" id="tel"><h3> Téléphones : 96288035 / 58695769.</h3></div>
    <div  class="pied" id="copyr"><h5> &copy; hedia smida 2020</h5></div>
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
