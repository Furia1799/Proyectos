<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>TERAPEUTA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/principal.css">
   <script src="js/jquery.js"></script>
</head>
<body>
<header>
  <!--creacion de imagen -->
  <div  class="container">
    <div  class="row">
      <div  class="col-lg-4 col-lg-offset-4">
        <img src="imagenes/logoterapeuta.jpg" class="img-rounded" width="350" height="100">
      </div>
    </div>
  </div>
</header>
  <!--BARRA DE NAVEGACION-->

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img id="logo" alt="logo" src="imagenes/logo.png"></a>
          </div>
          <ul class="nav navbar-nav">
            <li id="inicio"class="active"><a href="#">INICIO</a></li>
            <li id="doctores"><a href="php/doctoresform.php">DOCTORES</a></li>
            <li id="pacientes"><a href="php/pacienteform.php">PACIENTES</a></li>
            <li id="consultorios"><a href="php/consultorioform.php">CONSULTORIOS</a></li>
            <li id="citas"><a href="php/citaform.php">CITAS</a></li>
            <li id="expediente"><a href="php/expedienteform.php">EXPEDIENTE</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>SALIR</a></li>
          </ul>
        </div>
      </nav>

  <div class="container">
      <div class="page-header">
          <h1 id="sub"class="text-center">BIENVENIDO  <?php  echo $_SESSION['nombre'];?></h1>
      </div>
      <br>
    <section>
        <div id="row1">
            <div class="row" >
              <div class="col-lg-6">
                <article class="">
                      <img id="img0"src="imagenes/terapeuta_1.jpg" class="img-rounded" alt="Terapeuta_1" width="500" height="300">
                </article>
              </div>
              <div class="col-lg-6 text-left">
                <article  id="fila_1" class="">
                  <h2>Misión</h2>
                  <p class="text-justify">
                      Contribuir al mejoramiento de la calidad de vida de los pacientes mediante la rehabilitación integral de sus discapacidades transitorias o permanentes, brindando una atención óptima de acuerdo a las necesidades y expectativas de cada persona.
                      Disponiendo de todos mis conocimientos teórico prácticos y de la experiencia profesional para poder prestar un servicio acorde a las nuevas tendencias de salud y al avance científico tecnológico de la profesión.
                  </p>
                </article>
              </div>
            </div>
        </div>
    <div class="row">
          <div class="col-lg-6">
              <article  id="fila_2"class="">
                  <h2>Visión</h2>
                  <p class="text-justify">
                        Ser un componente esencial en Fisioterapia que promete tratamientos calificados e innovadores en el proceso de rehabilitación, prestando un excelente servicio como profesional y especialista en rehabilitación de la mano y del miembro superior. Ser líder, por la capacidad de gestión con una estructura administrativa y financiera sólida que garantiza integralidad, alta calidad y óptima atención a nuestros pacientes.
                    </p>
              </article>
          </div>
          <div class="">
              <article class="col-lg-6">
                  <img id="img1"src="imagenes/terapeuta_2.jpg" class="img-rounded" alt="Terapeuta_2" width="500" height="300">
              </article>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-4 text-center">
              <h3>Consultorios</h3>
              <br>
              <img id="img2"src="imagenes/consultorio.jpg"  class="img-rounded" alt="consultorio" width="300" height="200">
              <p></p>
          </div>
          <div class="col-lg-4 text-center">
              <h3>Area de Rehabilitacion</h3>
              <br>
              <img id="img3"src="imagenes/arearehabilitacion.jpg" alt="rehabilitacion"  class="img-rounded"width="300" height="200">
              <p></p>
          </div>
          <div class="col-lg-4 text-center">
              <h3>Equipo moderno</h3>
              <br>
              <img id="img4"src="imagenes/equipo.jpg" alt="equipo" class="img-rounded" width="300" height="200">
              <p></p>
          </div>
      </div>
    </section>
  </div>
  <br>
</body>
</html>

<?php
}else{
  header ('location:login.php');
}
?>
