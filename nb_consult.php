<?php 
session_start();
function historique_consultation (){
    require('database_connection.php');
    $id_fiche= $_GET['id_fiche'] ;
$somme=0 ;
$i = 0;
    $sql = "SELECT id_rdv FROM rdv WHERE id_fiche=".$id_fiche." ;";
    if($result = mysqli_query($con,$sql)){
    while($row = mysqli_fetch_assoc($result)){
     $sql1="SELECT * FROM constitue WHERE id_rdv=".$row['id_rdv'].";";
     $result1 = mysqli_query($con,$sql1);
     $j = 0;
     while ($row1 = mysqli_fetch_assoc($result1)){

        $sql2="SELECT id_rdv_sean AS nb FROM consultation WHERE id_rdv_sean=".$row1['id_rdv_sean'].";";
        $result2 = mysqli_query($con,$sql2);
    
      if($row2 = mysqli_fetch_assoc($result2)){

         $sql3="SELECT COUNT (id_seance) AS nb_seance FROM constitue WHERE id_rdv_sean=".$row2['id_rdv_sean']."; ";
        if( $result3 = mysqli_query($con,$sql3)){
         $row3 = mysqli_fetch_assoc($result3);

$somme = $somme + $row3['nb_seance'];


         }

      }else
      {
          $j++;
      }
    }
    $i++;
}}else{
    echo "vide";
}
  


    return $somme;
    $mysqli -> close();
}


$a =  historique_consultation()  ;

?>