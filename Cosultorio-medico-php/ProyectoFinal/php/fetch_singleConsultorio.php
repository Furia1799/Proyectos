<?php

include('db.php');
include('functionConsultorio.php');
if(isset($_POST["user_id"])){
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM consultorio
  WHERE id = '".$_POST["user_id"]."'
  LIMIT 1");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row){

      $output["equipamiento"] = $row["equipamiento"];
      $output["observaciones"] = $row["observaciones"];

 }
 echo json_encode($output);
}

 ?>
