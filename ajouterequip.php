<html>
<head>
<title></title>
<link href="ajouterrepas.css" rel="stylesheet">
<meta charset="UTF-8">
</head>
<body>



<?php 
session_start();
$email= $_GET['email'];
require('database_connection.php');
try{

    $sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

    if($result1 = mysqli_query($con,$sql))
    {
        $row=mysqli_fetch_assoc($result1);
    
    $cin= $row['cin'];}

    if (isset($_POST['botaj']) ){
        
        $code=$_POST['code_equip'];
    $nom=$_POST['nom_equip'];
    $mrq_eq=$_POST['mrq_eq'];
    $file=addslashes(file_get_contents($_FILES["img_eq"]["tmp_name"]));



    $req="SELECT * FROM equipement WHERE code_eq =".$code.";";
    if($result = mysqli_query($con,$req) == false || mysqli_num_rows($result)==0 ){
      
            $query="INSERT INTO `equipement`
            VALUES ('".$code."','".$nom."','".$mrq_eq."','$file','".$cin."')";
          
             if(  $result2 = mysqli_query($con,$query)){
                 echo "<div class='forme1'></div><div class='message'>ajout effectuer avec succées !</div>";
             }else {
                echo "<div class='forme1'></div><div class='message'>déja existe!</div>";
          } 
    }
            

        } 
     
    
    
    
}


catch (Exception $e){
echo "houdhoud" ;
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

<a href="listeequipement.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10px;" > </div> </a>

<div id="container" style="position: absolute;  background-color: rgba(48, 20, 20, 0.329); width:500px; height:600px; left:25%; top:30px;">
    <h1 id="titre" style="color: white; font-size:38px; position: absolute; left:90px;">Ajouter équipement</h1>


    <form action="" method="POST" enctype="multipart/form-data" >

    <label for="code_equip"  style=" 
position:absolute;
font-size:18px; 
left: 100px;
color:white;
top:80px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Code équipement :</label> <br>
<input type="text" id="code_equip" name="code_equip" placeholder="Code équipement ..." style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 110px;
color:maroon;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required ><br>



<label for="nom_equip" style=" 
font-size:18px;
position:absolute;
font-size:17px; 
left: 100px;
top:170px;
color:white;
font-weight: bold;
text-decoration: maroon wavy underline;
" > Nom d'équipement :</label> <br>
<input type="text" id="nom_equip" name="nom_equip" placeholder="Nom d'équipement ..." 
style="
font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
 color:maroon;
top: 200px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
"

REQUIRED><br>
<label for="mrq_eq"  style=" 
font-size:18px;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
top:270px;
font-weight: bold;
text-decoration: maroon wavy underline;
"> Marque  :</label> <br>
<input type="text" id="mrq_eq" name="mrq_eq" placeholder="Marque équipement..." style="
font-size:16px;
 position:absolute;
 color:maroon;
 width:300px;
 height:40px;
top: 300px;
left:100px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required><br>


<laber for="img_eq" style=" 
font-family: Times New Roman;
position:absolute;
font-size:17px; 
color:white;
left: 100px;
font-size:18px;
top:400px;
font-weight: bold;
text-decoration: maroon wavy underline;
">Image équipement :</label> <br>
<input type="file"  id="img_eq" name="img_eq" style="
 font-family: Arial, Helvetica, sans-serif;
top: 30px;
color:maroon;
left:60px;
position:absolute;
font-size:16px;
"    accept="image/jpeg, image/png"    required><br>
<button style="
 background: maroon;
 font-weight: bold;
 font-size:16px;
 position:absolute;
 width:300px;
 height:40px;
top: 80px;
left:0px;
border:none;
color: white;
border-radius:10px;
"   name="botaj" id="bot-aj">  Ajouter </button>



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
