
<?php
require('database_connection.php');
$req= "SELECT CURDATE() As houd;";
$result = mysqli_query($con,$req);
echo "houd";
if($result==true ){
  echo"houd";
  $row=mysqli_fetch_assoc($result);
  $user=$row['houd'];

echo $user ;
echo "ujhbjvghvlhgl";
}else {

  echo "rien";
}
?>
