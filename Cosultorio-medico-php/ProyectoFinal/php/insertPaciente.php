<?php
include('db.php');
include('functionPaciente.php');

if(isset($_POST["operation"])){
    if($_POST["operation"] == "Add"){

        //procedimientos almacenados

        $nombre =$_POST["nombre"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $nacimiento = $_POST["nacimiento"];
        $email= $_POST["email"];
        $pwd = $_POST["pwd"];
        $cel = $_POST["cel"];
        $status= "Activo";
        $genero = $_POST["genero"];

        $sql = "CALL insertarAlumnos('$nombre','$apellidoP','$apellidoM','$nacimiento','$email','$pwd','$cel','$status','$genero')";

        $statement = $connection->prepare($sql);
      $result = $statement->execute(
       array(
        ':nombre'=> $_POST["nombre"],
        ':apellidoP'=> $_POST["apellidoP"],
        ':apellidoM'=> $_POST["apellidoM"],
        ':nacimiento'=> $_POST["nacimiento"],
        'email'=> $_POST["email"],
        ':pwd'=> $_POST["pwd"],
        ':cel'=> $_POST["cel"],
        ':status'=> "Activo",
        ':genero'=> $_POST["genero"]));
      if(!empty($result)){
       echo 'Data Inserted';
      }
     }


     if($_POST["operation"] == "Edit"){
      $statement = $connection->prepare(
       "UPDATE usuarios
        SET nombre = :nombre, apellidoP = :apellidoP, apellidoM=:apellidoM,nacimiento = :nacimiento, email = :email,
       pwd = :pwd ,cel = :cel,status = :status ,genero = :genero WHERE id = :id");
      $result = $statement->execute(
          array(
          ':nombre'=> $_POST["nombre"],
          ':apellidoP'=> $_POST["apellidoP"],
          ':apellidoM'=> $_POST["apellidoM"],
          ':nacimiento'=> $_POST["nacimiento"],
          'email'=> $_POST["email"],
          ':pwd'=> $_POST["pwd"],
          ':cel'=> $_POST["cel"],
          ':status'=> "Activo",
          ':genero'=> $_POST["genero"],
        ':id'   => $_POST["user_id"]));
      if(!empty($result)){
       echo'Data Updated';
    }
}
}

?>
