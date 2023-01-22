<?php

session_start();

require('database_connection.php'); 

$req="SELECT * FROM fiche_patiente WHERE id_fiche=".$_GET['id_fiche'];
if($res=mysqli_query($con,$req)){
    $row=mysqli_fetch_assoc($res);
   

}else{
    echo "";
}

$req1="SELECT * FROM consultation WHERE id_conslt=".$_GET['id_consult'];
if($res1=mysqli_query($con,$req1)){
    $row1=mysqli_fetch_assoc($res1);
}


$obj_poid= $row['tail_pat'] - 100 -(($row['tail_pat']-150 )/2.5) ;
$poid_perdu = $row['poids_pat'] - $row1['poids_act'];
$poid_a_perdre =  $row1['poids_act']-$obj_poid ;

$imc= $row1['poids_act']/ (($row['tail_pat']/100)* ($row['tail_pat']/100));
$imc_f = $obj_poid/(($row['tail_pat']/100)* ($row['tail_pat']/100));

$img= (1.20*$imc)+(0.23* $row['age_pat'])-5.4	;
$img_f=(1.20*$imc_f)+(0.23* $row['age_pat'])-5.4	;
?>


<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>

<input type="hidden" id="id_imc" value="<?php  echo $imc ?>" />
<script>
function imc(){
var =  document.getElementById(div) ; 
alert (var) ;


if ( var < 18.5 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById(div).style.color='white';
}
if ( 18.5 < var < 25 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById().style.color='white';
}
if ( 25 < var < 30 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById(div).style.color='white';
}
if ( 30 < var < 35 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById(div).style.color='white';
}
if ( 35 < var < 40 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById(div).style.color='white';
}
if (  var > 40 ){
    document.getElementById(div).style.backgroundColor='maroon';
    document.getElementById(div).style.color='white';
}
}
</script>


<button onclick="window.print()"     style="position:absolute; background:black ; border:none; color : white; border-radius:50px;top:820px; left:200px; width:300px;"><img src="icons8-impression-16.png"   style="podition:absolute; width:30px; height:30px; border-radius:50px; "> <h2>Imprimer rapport </h2></button>

<div class="cadre" id="poid_act" >   
    <center>  <h3> Poids actuel </h3></center>
    <center>  <h1 style="color:maroon;"> <?php  echo $row1['poids_act'];  ?> KG  </h1></center>
</div>
<div  class="cadre" id="objet_poids" >
    <center>  <h3> Taille de hanche actuel :  <?php  echo $row1['poids_act'];  ?> Cm   </h3></center>

    <center>  <h3> Taille de ventre actuel  :  <?php  echo $row1['poids_act'];  ?> Cm  </h3></center>
 
</div>
<div  class="cadre" id="perdu">
    <center>  <h3> Poids de départ </h3></center>
    <center>  <h3 style="color:maroon;"> <?php  echo $row['poids_pat'];  ?> KG </h3></center>
    <center>  <h4> perdu </h4></center>
    <center>  <h3 style="color:maroon;"> <?php echo $poid_perdu ; ?> KG </h3></center>
</div>
<div  class="cadre" id="aperdu">
    <center>  <h3> Objectif de fin </h3></center>
    <center>  <h3 style="color:maroon;" > <?php echo $obj_poid ; ?>KG </h3></center>
    <center>  <h4> A perdre </h4></center>
    <center>  <h3 style="color:maroon;" > <?php echo $poid_a_perdre ; ?> KG </h3></center>
</div>

<div  class="cadre" id="imc">
    <center>  <h3>IMC </h3></center>
    <center>  <h3><?php  echo  $imc ; ?> </h3></center>
    <center>  <h3> Objectif d'IMC </h3></center>
    <center>  <h3><?php echo  $imc_f ?>   </h3></center>
</div>
<div  class="cadre" id="imc1">
    <center>  <h3>IMG </h3></center>
    <center>  <h3><?php  echo $img ?> </h3></center>
    <center>  <h3> Objectif d'IMG </h3></center>
    <center>  <h3><?php  echo $img_f ?> </h3></center>
</div>



<div  class="cadre" id="p1" onload="imc()" > <center>  <h3>insuffisance pondérale                <18.5 </h3></center>  </div>
<div  class="cadre" id="p2"  onload="imc()" >  <center>  <h3>poids normal                          18.5-25 </h3></center>  </div>
<div  class="cadre" id="p3" >  <center>  <h3>surpoids                           25-30</h3></center>  </div>
<div  class="cadre" id="p4" >  <center>  <h3>obésité modérée                    30-35</h3></center>  </div>
<div  class="cadre" id="p5" >  <center>  <h3>obésité sérvére      35-40</h3></center>  </div>
<div  class="cadre" id="p6" >  <center>  <h3>obésité massive         >40</h3></center>  </div>










<style>
#p1{

top:450px;
height:50;
left : 200px;
}

#p2{

top:510px;
height:50;
left : 200px;
}


#p3{

top:570px;
height:50;
left : 200px;
}

#p4{

top:630px;
height:50;
left : 200px;
}

#p5{

top:690px;
height:50;
left : 200px;
}


#p6{

top:750px;
height:50;
left : 200px;
}

#imc{

left:350px;
top:280px;
height:150px;
}
#imc1{
    top:280px;
    height:150px;

}



#aperdu{

left:350px;
top:120px;
height:150px;
}
#perdu{
    top:120px;
    height:150px;

}
.cadre{
position:absolute;
width:300px;
height:100px;
background:WHITE;
border-radius:20px;
left:40px;
}
#objet_poids{

left:350px;

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



