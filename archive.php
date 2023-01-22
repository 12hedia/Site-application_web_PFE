<?php
session_start();
?>
<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>


<a href="archivecompte.php?email=<?php echo $_GET['email'] ?>"><div class="cont" ><h1 style="color:white; position:absolute; left:250px; top:0px;"> Archives compte </h1></div></a>

<a href="archiveactualitecentre.php?email=<?php echo $_GET['email'] ?>"><div class="cont"  id="div2" ><h1 style="color:white;position:absolute; left:200px; top:0px;"> Archives actualite centre </h1></div></a>

<a href="listeactualiteoffre.php?email=<?php echo $_GET['email'] ?>"><div class="cont" id="div3" ><h1 style="color:white; position:absolute; left:210px; top:0px;"> Archives actualité offre </h1></div></a>

<a href="archivefichepatiente.php?email=<?php echo $_GET['email'] ?>"><div class="cont" id="div4"><h1 style="color:white;position:absolute; left:220px; top:0px;"> Archives fiche patiente </h1></div></a>


<a href="listeactualiteoffre.php?email=<?php echo $_GET['email'] ?>"><div class="cont" id="div5" ><h1 style="color:white; position:absolute; left:220px; top:0px;"> Archives consultation </h1></div></a>

<style>
.cont{
position:relative;
background:maroon;
width:700px;
height:80px;
border-radius:10px;
left:100px;

}

#div2{

    top:50px;

}
#div3{

top:100px;

}

#div4{

top:150px;

}
#div5{

top:200px;

}

</style>
</body>
</html>



