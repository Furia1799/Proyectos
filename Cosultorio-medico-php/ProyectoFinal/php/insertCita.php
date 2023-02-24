<?php
include('db.php');
include('functionCita.php');

if(isset($_POST["operation"])){
    if($_POST["operation"] == "Add"){

        $statement = $connection->prepare("
        INSERT INTO citas (fecha,hora,peso,estatura,observaciones,doctor_id,paciente_id,consultorio_id)
        VALUES (:fecha,:hora,:peso,:estatura,:observaciones,:doctor_id,:paciente_id,:consultorio_id)");
      $result = $statement->execute(
       array(
        ':fecha'=> $_POST["fecha"],
        ':hora'=> $_POST["hora"],
        ':peso'=> $_POST["peso"],
        ':estatura'=> $_POST["estatura"],
        ':observaciones'=> $_POST["observaciones"],
        ':doctor_id'=> $_POST["doctor_id"],
        ':paciente_id'=> $_POST["paciente_id"],
        ':consultorio_id'=> $_POST["consultorio_id"]));
      if(!empty($result)){
       echo 'Data Inserted';
      }
     }

     if($_POST["operation"] == "Edit"){
      $statement = $connection->prepare(
       "UPDATE citas
        SET fecha = :fecha, hora = :hora, peso = :peso, estatura = :estatura, observaciones =:observaciones, doctor_id = :doctor_id, paciente_id = :paciente_id, consultorio_id = :consultorio_id  WHERE id = :id");
      $result = $statement->execute(
          array(
          ':fecha'=> $_POST["fecha"],
          ':hora'=> $_POST["hora"],
          ':peso'=> $_POST["peso"],
          ':estatura'=> $_POST["estatura"],
          ':observaciones'=> $_POST["observaciones"],
          ':doctor_id'=> $_POST["doctor_id"],
          ':paciente_id'=> $_POST["paciente_id"],
          ':consultorio_id'=> $_POST["consultorio_id"],
          ':id'   => $_POST["user_id"]));
      if(!empty($result)){
       echo'Data Updated';
    }
}
}

?>
