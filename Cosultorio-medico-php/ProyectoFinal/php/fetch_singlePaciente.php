<?php

include('db.php');
include('functionPaciente.php');
if(isset($_POST["user_id"])){
 $output = array();//SELECT * FROM usuarios WHERE id = '".$_POST["user_id"]."'LIMIT 1
 $idusuario=$_POST["user_id"];
 $sql = "CALL unoUsuario('$idusuario')";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row){

  $output["nombre"] = $row["nombre"];
  $output["apellidoP"] = $row["apellidoP"];
  $output["apellidoM"] = $row["apellidoM"];
  $output["nacimiento"] = $row["nacimiento"];
  $output["email"] = $row["email"];
  $output["pwd"] = $row["pwd"];
  $output["cel"] = $row["cel"];
  $output["status"] = $row["status"];
  $output["genero"] = $row["genero"];


 }
 echo json_encode($output);
}

 ?>
