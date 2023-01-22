<?php
// var_dump($_GET);
// on sépare les paramétre 

$params= explode('/',$_GET['p']);
//var_dump($params);


//verifier s'il existe de paramétre ou non .

if($params[0] != ""){
    $controller= ucfirst($params[0]);
    echo $controller;
}else
{
    echo "aucune parametre";
}

 ?>