<?php
include('db.php');
include('functionDoctor.php');

if(isset($_POST["operation"])){
    if($_POST["operation"] == "Add"){

        $statement = $connection->prepare("
        INSERT INTO doctores (nombre,apellidoP,apellidoM,nacimiento,email,pwd,status,genero)
        VALUES (:nombre,:apellidoP,:apellidoM,:nacimiento,:email,:pwd,:status,:genero)");
      $result = $statement->execute(
       array(
        ':nombre'=> $_POST["nombre"],
        ':apellidoP'=> $_POST["apellidoP"],
        ':apellidoM'=> $_POST["apellidoM"],
        ':nacimiento'=> $_POST["nacimiento"],
        'email'=> $_POST["email"],
        ':pwd'=> $_POST["pwd"],
        ':status'=> "Activo",
        ':genero'=> $_POST["genero"]));
      if(!empty($result)){
       echo 'Data Inserted';
      }
     }


     if($_POST["operation"] == "Edit"){
      $statement = $connection->prepare(
       "UPDATE doctores
        SET nombre = :nombre, apellidoP = :apellidoP, apellidoM=:apellidoM,nacimiento = :nacimiento, email = :email,
       pwd = :pwd ,status = :status ,genero = :genero WHERE id = :id");
      $result = $statement->execute(
          array(
          ':nombre'=> $_POST["nombre"],
          ':apellidoP'=> $_POST["apellidoP"],
          ':apellidoM'=> $_POST["apellidoM"],
          ':nacimiento'=> $_POST["nacimiento"],
          'email'=> $_POST["email"],
          ':pwd'=> $_POST["pwd"],
          ':status'=> "Activo",
          ':genero'=> $_POST["genero"],
        ':id'   => $_POST["user_id"]));
      if(!empty($result)){
       echo'Data Updated';
    }
}
}

?>
