<?php
//obtener valores pasados en el form Login
$email = $_POST['email'];
$pwd = $_POST['pwd'];

/*
$email = stripcslashes($email);
$pwd = stripcslashes($pwd);
$email = mysqli_real_escape_string($email);
$pwd = mysqli_real_escape_string($pwd);
*/

//conect with de server and database
$mysqli = new mysqli("localhost","root", "", "terapeutafinal");
//mysql_select_db("tf");

//query the database for user
$result = $mysqli->query("SELECT * FROM doctores WHERE email = '$email' && pwd ='$pwd'")
          or die("failed to query database".mysql_error());
$row = mysqli_fetch_array($result);
if($row['email']==$email && $row['pwd']==$pwd) {
  echo "login succes, Welcome ".$row['nombre'];//inprimimos el nombre
  //empezamos la sesion
  session_start();
  $_SESSION['id']=$row['id'];
  $_SESSION['nombre']=$row['nombre'];
  $_SESSION['apellidoP']=$row['apellidoP'];
  $_SESSION['apellidoM']=$row['apellidoM'];
  $_SESSION['nacimiento']=$row['nacimiento'];
  $_SESSION['email']=$row['email'];
  $_SESSION['pwd']=$row['pwd'];
  $_SESSION['status']=$row['status'];
  $_SESSION['genero']=$row['genero'];
  //direcionarnos a
  header('location: index.php');
}else{
  echo "failed to login";
  //si falla direccionar a login
  header('location: login.php');
}
 ?>
