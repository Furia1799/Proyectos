<?php

include('db.php');
include("functionPaciente.php");

if(isset($_POST["user_id"])){

$idusuario=$_POST["user_id"]; //"DELETE FROM usuarios WHERE id = :id"
$sql= "CALL eliminarUsuarios('$idusuario')";
 $statement = $connection->prepare($sql);
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]));

 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}

 ?>
