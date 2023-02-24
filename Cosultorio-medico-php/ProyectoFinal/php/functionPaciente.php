<?php


function get_total_all_records(){
 include('db.php');
 //"SELECT * FROM usuarios"
 //procedimientos almacenados
 $sql = "CALL mostrarAlumnos";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

 ?>
