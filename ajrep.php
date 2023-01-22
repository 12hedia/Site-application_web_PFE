<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>




<?php 
session_start();
$email= $_GET['email'];
require('database_connection.php');
try{

    $sql="SELECT * FROM compte_user WHERE email='".$email."' ;";

    if($result = mysqli_query($con,$sql))
    {
        $row=mysqli_fetch_assoc($result);
        
    $cin= $row['cin'];


    $query="INSERT INTO `repas`
 VALUES (0, ,".$_POST['nomrep'] .",".$_POST['calor'] .",'".$_POST['qte']."','".$_POST['img_rep']."',".$cin.")";
    $result = mysqli_query($con,$query);

 echo "bien inserer";

    }

else {

    echo "erreur ";
}
}
catch (Exception $e){
echo "houdhoud" ;
}
?>

</body>
</html>
