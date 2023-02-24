<?php

include('db.php');
include("functionCita.php");

if(isset($_POST["user_id"])){

 $statement = $connection->prepare(
  "DELETE FROM citas WHERE id = :id");
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]));

 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}

 ?>
