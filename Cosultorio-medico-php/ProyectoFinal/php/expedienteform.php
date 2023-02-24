<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../css/tablas.css">
      <link rel="stylesheet" href="../css/barra.css">
    <title>Expediente</title>
  </head>
  <body>

      <header>
          <!--imagen titulo-->
          <div  class="container">
            <div  class="row">
              <div  class="col-lg-4 col-lg-offset-4">
                <img src="../imagenes/logoterapeuta.jpg" class="img-rounded" width="350" height="100">
              </div>
            </div>
          </div>

      </header>

      <!--BARRA DE NAVEGACION-->

          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#"><img id="logo" alt="logo" src="../imagenes/logo.png"></a>
              </div>
              <ul class="nav navbar-nav">
                <li id="inicio"><a href="../index.php">INICIO</a></li>
                <li id="doctores" ><a href="doctoresform.php">DOCTORES</a></li>
                <li   id="pacientes"><a href="pacienteform.php">PACIENTES</a></li>
                <li id="consultorios" ><a href="consultorioform.php">CONSULTORIOS</a></li>
                <li id="citas"><a href="citaform.php">CITAS</a></li>
                <li class="active" id="expediente"><a href="expedienteform.php">EXPEDIENTE</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span>SALIR</a></li>
              </ul>
            </div>
          </nav>


      <br>
<!--TABLA-->
    <div id="caja" class="container box">
        <div class="page-header">
            <h1 id="sub"class="text-center">EXPEDIENTE
        </div>
        <br />


    <div class="table-responsive">
    <br/>
    <br>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
          <th width="50%">id_expediente</th>
          <th width="50%">cita_id</th>
      </tr>
     </thead>
    </table>
    </div>
    </div>
    <br>
  </body>
</html>
<!--ingresar y modificar -->



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add Cita");
  $('#action').val("Add");
  $('#operation').val("Add");
  //$('#user_uploaded_image').html('');
 });

 var dataTable = $('#user_data').DataTable({//tabla
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchExpediente.php",//traer todo los datos
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[],//columnas en las que son botones o imagenes
    "orderable":false,
   },
  ],

 });

});

</script>

<?php
}else{
  header ('location:login.php');
}
?>
