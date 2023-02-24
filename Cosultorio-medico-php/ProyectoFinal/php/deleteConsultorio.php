<?php
include('db.php');
include("functionPaciente.php");

if(isset($_POST["user_id"])){

 $statement = $connection->prepare(
  "DELETE FROM consultorio WHERE id = :id");
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]));

 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}

 ?>
