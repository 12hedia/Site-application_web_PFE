<html>
<head>
<title><?php echo $_GET['user'] ?> | centre coquette</title>
<link href="session_admin.css" type="text/css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="h1.jpg">
</head>
<body>
<?php
session_start();
?>
<div id="container"></div>

<div id="tabs">

<div id="img"></div>
<h1 style="color:white;top:20px;left:130px;position:absolute;"><?php echo $_GET['user'] ; ?></h1>
<h3 id="email_user"style="color:white;top:80px;left:120px;position:absolute;"> <?php echo $_GET['email'] ?> </h3>
<a href="archive.php?email=<?php echo $_GET['email'] ?>"target="container" onclick="com_click('tab');" ><div id="arch" ></div></a>
<a href="listerdvajourd.php?email=<?php echo $_GET['email'] ?>"target="container" onclick="com_click('tab');"><div class="tabstab" id="tab" ><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rendz-vous</h1></div></a>
<a href="listefiche.php?email=<?php echo $_GET['email'] ?>"target="container" onclick="com_click('tab2');"><div class="tabstab" id="tab2"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fiche patiente</h1></div></a>
<a href="listepatiente.php?email=<?php echo $_GET['email'] ?>"target="container" onclick="com_click('tab3');"><div class="tabstab" id="tab3"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Consultation</h1></div></a>
<a  ><div class="tabstab" id="tab4"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Equipements</h1></div></a>
<a  ><div class="tabstab" id="tab5"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Actualités</h1></div></a>
<a><div class="tabstab" id="tab6"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Suivi statistique de centre</h1></div></a>
<a  ><div class="tabstab" id="tab7"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Repas</h1></div></a>
<a ><div class="tabstab" id="tab8"  ><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Gérer comptes</h1></div></a>
<a href="deconnecxion.php" onclick="com_click('tab9');" ><div class="tabstab" id="tab9"><h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Déconnexion</h1></div></a>

</div>

<style>

#arch{
position:relative;
background:url(cab_history_archive_archives_7220.ico);
background-repeat: round ;
top:-110px;
left:290px;
width: 40px;
    height: 40px;
}

</style>
<script>
function com_click(div) {

    if (div=='tab')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';

    }
    else{
        if (div=='tab2')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
else{

    if (div=='tab3')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }

    else {

        if (div=='tab4')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }

    else {
        if (div=='tab5')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
else{
 
    if (div=='tab6')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
    else {

        if (div=='tab7')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
    else {
        if (div=='tab8')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab9').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
    else{

        if (div=='tab9')
    {
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById('tab2').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab3').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab4').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab5').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab6').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab7').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab8').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    document.getElementById('tab').style.backgroundColor='rgba(48, 20, 20, 0.329)';
    }
    }
    
    }
    }
}
    }
    }
}
    }
}



</script>


<div id="container2" style="top: 0px;
margin: 0px;
padding: 0px;">
<iframe src="" name="container" style="position:absolute;left:10px;top:0px; padding:0px; border:2px solid rgba(48, 20, 20, 0.329); margin:0px;" width="99.5%" height="99%"></iframe>

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

