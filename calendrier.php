

<html>
<head>
<title>  </title>


<link href=".css" rel="stylesheet">

</head>
<body>

<?php

session_start();
if (isset($_POST['ok']))
{
    header("Location: gererdv.php?date=". $_POST['date'] ."&email=".$_GET['email']."");
}

?>

<a href="listerdvajourd.php?email=<?php echo $_GET['email'] ?>"> <div id=im style="background :url(back-arrow_icon-icons.com_72866.ico);
position:absolute;
background-repeat: round;
width:50px;
height: 50px;
top:10px;
left:10;" > </div> </a>
<form method="POST" action="">
<h1 style="color:white; left:45%; position:absolute; ">Calendrier</h1>
<input type="date" id="date" name="date"   min="2018-01-01" style="
font-size:16px;
 position:absolute;
 width:400px;
 height:40px;
 color:maroon;
top: 100px;
left:300px;
border-left:none;
border-top:none;
border-color:black;
border-radius:10px;
" required>
<button name="ok" style="position:absolute; left:700px; top:100; width:30px; height:40px; background:url(arrowsmallright_106476.ico); background-repeat:round;" ></button>
</body>
</html>

