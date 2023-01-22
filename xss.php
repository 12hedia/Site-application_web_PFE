<?php
session_start();
?> 
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'securite');
function connect()
{
  $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

  if (mysqli_connect_errno($connect)) {
    die("Failed to connect:" . mysqli_connect_error());
  }
  mysqli_set_charset($connect, "utf8");
  return $connect;

}
?>
<?php

$con = connect();
    if (isset($_GET['boutton']) ){
    $query="INSERT INTO `HEHO`
 VALUES (0,'".$_GET['area'] ."')";
  $result = mysqli_query($con,$query) ;
  echo $_GET['area'] ;
}
?>
<! DOCTYPEHTML>
<html>
<head>
<title> Hedia housssem attaque </title>
<link rel="icon" href="/3440904-add-ecommerce-favorite-heart-love-plus_107518.ico" type="image/x-icon">
<style>
body{
  background-color: black;  
}
input {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
div{
  border: 5px ;
  background-color: black;    
  text-align: center;
}
button {

 
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: 8B0000; 
  color: white; 
  border: 2px solid white;
}
p{
  color : white;
}
</style>

</head>
<body>
<div>
<img src="xssattaque.png" />

<form action="#" method="get">

<input id="text1" name="area" placeholder="Your name..">
</input>
<br>
<button id="b1" name="boutton" > Send </button>
</form>
<p>&copy; Hedia Smida & Houcem Hdidar</p>
</div>

</body>
</html>