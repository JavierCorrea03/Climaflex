<?php
include '../conector.php';


    $sql = "SELECT * FROM cliente";
    $result = $db->prepare($sql);
    $result->execute();
    $rows = $result->rowCount();


    if ($rows > 0){

        for ($i = 0; $row = $result->fetch(); $i++) {

            echo "nombre = ".$row['nombre'];
        }
    }
     else {   
         echo "No existen registros";
     }
