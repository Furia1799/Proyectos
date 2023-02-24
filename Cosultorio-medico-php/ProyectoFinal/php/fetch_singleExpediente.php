<?php

include('db.php');
include('functionExpediente.php');
if(isset($_POST["user_id"])){
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM expediente
  WHERE id_expediente = '".$_POST["user_id"]."'
  LIMIT 1");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row){

      $output["id_expediente"] = $row["id_expediente"];
      $output["cita_id"] = $row["cita_id"];
      
 }
 echo json_encode($output);
}

 ?>
