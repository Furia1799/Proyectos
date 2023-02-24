<?php
include('db.php');
include('functionDoctor.php');
if(isset($_POST["user_id"])){
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM doctores
  WHERE id = '".$_POST["user_id"]."'
  LIMIT 1");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row){

  $output["nombre"] = $row["nombre"];
  $output["apellidoP"] = $row["apellidoP"];
  $output["apellidoM"] = $row["apellidoM"];
  $output["nacimiento"] = $row["nacimiento"];
  $output["email"] = $row["email"];
  $output["pwd"] = $row["pwd"];
  $output["status"] = $row["status"];
  $output["genero"] = $row["genero"];

 }
 echo json_encode($output);
}

 ?>
