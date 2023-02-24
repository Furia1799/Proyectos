<?php

include('db.php');
include('functionCita.php');
if(isset($_POST["user_id"])){
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM citas
  WHERE id = '".$_POST["user_id"]."'
  LIMIT 1");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row){

      $output["fecha"] = $row["fecha"];
      $output["hora"] = $row["hora"];
      $output["peso"] = $row["peso"];
      $output["estatura"] = $row["estatura"];
      $output["observaciones"] = $row["observaciones"];
      $output["doctor_id"] = $row["doctor_id"];
      $output["paciente_id"] = $row["paciente_id"];
      $output["consultorio_id"] = $row["consultorio_id"];


 }
 echo json_encode($output);
}

 ?>
