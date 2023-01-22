<html>
<head>
<title></title>
<link href="listerepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>


<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:800px; height:620px; left:8%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:120px;">Statistique du rendement du centre</h1>
<form >
 <label for="ans" style=" 
position:absolute;
font-size:18px; 
left: 200px;
color:white;
top:100px;
font-weight: bold;
text-decoration: maroon wavy underline;"> Année : </label>
 <input type="number" id="ans" name="annee" min="2018"  style="
font-size:16px;
 position:absolute;
 width:250px;
 height:40px;
top: 90px;
color:maroon;
left:320px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required  />  

</form>
<center><table cellspacing="0" style="position:absolute; left:100px; top:170px;">
<tr>
<th>Mois</th>
<th>Nombre de patiente</th>
<th>Revenu mensuel</th>
<th>Rendement</th>

</tr>
<?php 
session_start();
?>

<tr>
<td class="td-left" style="color:white;" >Revenu annel : </td>
<td class="td-right" style="color:white;" ></td>
</tr>
</table></center>
 

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
