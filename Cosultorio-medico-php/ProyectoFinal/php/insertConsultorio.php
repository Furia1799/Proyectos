<?php
include('db.php');
include('functionConsultorio.php');

if(isset($_POST["operation"])){
    if($_POST["operation"] == "Add"){

        $statement = $connection->prepare("
        INSERT INTO consultorio (equipamiento,observaciones)
        VALUES (:equipamiento,:observaciones)");
      $result = $statement->execute(
       array(
        ':equipamiento'=> $_POST["equipamiento"],
        ':observaciones'=> $_POST["observaciones"]));
      if(!empty($result)){
       echo 'Data Inserted';
      }
     }

     if($_POST["operation"] == "Edit"){
      $statement = $connection->prepare(
       "UPDATE consultorio
        SET equipamiento = :equipamiento, observaciones =:observaciones  WHERE id = :id");
      $result = $statement->execute(
          array(
          ':equipamiento'=> $_POST["equipamiento"],
          ':observaciones'=> $_POST["observaciones"],
          ':id'   => $_POST["user_id"]));
      if(!empty($result)){
       echo'Data Updated';
    }
}
}

?>
