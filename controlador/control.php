<?php
include '../conector.php';

    $sql = "SELECT c.nombre, c.apellido, p.descripcion, p.precio, m.tipo_de_movimiento, m.fecha_de_movimiento
            FROM movimientos m
            INNER JOIN productos p ON p.id_producto = m.id_producto 
            INNER JOIN clientes c ON c.id_cliente = m.id_cliente 
            WHERE p.precio > 250.00
            ORDER BY m.fecha_de_movimiento";
    $result = $db->prepare($sql);
    $result->execute();
    $rows = $result->rowCount();

    if ($rows > 0){
        for ($i = 0; $row = $result->fetch(); $i++) {
            $array_query["data"][] = array(
                'nombre'                => $row['nombre'], 
                'apellido'              => $row['apellido'], 
                'descripcion'           => $row['descripcion'], 
                'precio'                => $row['precio'], 
                'tipo_de_movimiento'    => $row['tipo_de_movimiento'], 
                'fecha_de_movimiento'   => $row['fecha_de_movimiento']);
        }
    }
     else {   
         $array_query["data"] = array();
     }
     //--> Envio de Json
    if ($array_query == null || count($array_query) == 0) {
        echo json_encode(array("data" => array()));
    } else {
        echo json_encode($array_query);
    }