<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>
<form method="POST" action=""> 
 
     <p  style="position:absolute; color:maroon; left:70px;" >Rechercher un repas :</p> <input type="text" name="recherche"  style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 10px;
left:210px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
background:pink;
" require>
     <input type="SUBMIT" value="Rechercher!" style="
font-size:16px;
 position:absolute;
 width:150px;
 height:40px;
top: 10px;
left:530px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"  > 
     </form>

<center>

<table   style="position:absolute;  top:100px;  left:200px;" >
<tr>
<th> Image</th>
<th> Nom</th>
<th> Quantités</th>
<th> Calories</th>
</tr>
<?php  
require('database_connection.php');
$recherche="";
if( isset($_POST['recherche']) ? $_POST['recherche'] : ''){
$recherche= $_POST['recherche'];
$req="SELECT   *  from repas WHERE nom_rep like '%$recherche%';";
$i=0;
if($result = mysqli_query($con,$req)){
while($row= mysqli_fetch_assoc($result))
{
echo"<tr>";
echo '<td class="td-left"><img src="data:image;base64,'.base64_encode($row['img_rep']).'" style="border-radius:100px; width:50px ; height:50px;" /> </td>'; 
    echo "<td>".$row['nom_rep']."</td>";
    echo "<td>".$row['qte_rep']."</td>";
    echo "<td>".$row['calor_rep']."cal </td>";
    echo"</tr>";

    $i++;
}}
else {

    echo "";
}
}
?>



</tr>
</table>
</center>
<style>


th{

background-color: maroon;
font-size: 16px;
font-family: 'Times New Roman', Times, serif;

color: white;
border-radius: 8px;
height: 15px;
}

tr{
background-color: rgba(255, 249, 250, 0.171) ;
border-radius: 30px;
padding: 10px;
margin: 5px;
border-color: rgb(231, 37, 69);
border-color: white;


} 
</style>

</body>
</html>