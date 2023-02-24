<?php

include('db.php');
$row= null;
$result = null;

if(isset($_GET["buscar_nombre"])){
    $output = array();
    $statement = $connection->prepare(
    "SELECT  id,nombre,apellidoP,apellidoM,nacimiento FROM usuarios
    WHERE nombre = '".$_GET["buscar_nombre"]."' or apellidoP = '".$_GET["buscar_apellidoP"]."' or apellidoM = '".$_GET["buscar_apellidoM"]."' or id = '".$_GET["buscar_nombre"]."'
    LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        //$output["id_buscar"]
        $output["id_mostar"]=$row["id"];
        $output["nombre_mostrar"] = $row["nombre"];
        $output["apellidoP_mostar"] = $row["apellidoP"];
        $output["ApellidoM_mostar"] = $row["apellidoM"];
        $output["nacimiento_mostar"] = $row["nacimiento"];

    }


}

 ?>
