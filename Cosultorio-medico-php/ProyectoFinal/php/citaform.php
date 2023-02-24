<?php
session_start();
if(isset($_SESSION['id'])){
include 'buscar.php' ?>
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
    <title>Citas</title>
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
                <li id="pacientes"><a href="pacienteform.php">PACIENTES</a></li>
                <li id="consultorios" ><a href="consultorioform.php">CONSULTORIOS</a></li>
                <li class="active" id="citas"><a href="citaform.php">CITAS</a></li>
                <li id="expediente"><a href="expedienteform.php">EXPEDIENTE</a></li>
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
            <h1 id="sub" class="text-center">Citas
        </div>
        <br />
        <div class="form-inline">
            <form class="" action="citaform.html" method="post">
                <div class="container">
                    <div class="row col-lg-12">
                        <h3 class="bg-danger text-center">Datos del Doctor</h3>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="form-group">
                        <label class="control-label" for="">Id</label>
                        <input class="form-control"type="text" name="id_doctor" value="<?php echo $_SESSION['id']; ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre_doctor" value="<?php echo $_SESSION['nombre']; ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="">Apellido Paterno :</label>
                        <input class="form-control" type="text" name="apellidoP_doctor" value="<?php echo $_SESSION['apellidoP']; ?>" readonly >
                    </div>
                </div>

                <br>
            </form>
        </div>
        <!--buscar -->
        <div class="form-inline">
            <form action="citaform.php" method="GET">
                <div class="container">
                    <div class=" row col-lg-12">
                        <h3 class="bg-warning text-center" >Buscar Paciente</h3>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="form-group">
                        <label  class="control-label"for="">Nombre / (id) :</label>
                        <input class="form-control" type="text" name="buscar_nombre" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label"for="">Apellido P :</label>
                        <input class="form-control" type="text" name="buscar_apellidoP" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label"for="">Apellido M :</label>
                        <input class="form-control" type="text" name="buscar_apellidoM" value="">
                    </div>
                <button  class="btn btn-success"type="submit" name="butbuscar">Buscar</button>
                </div>

            </form>
        </div>
        <br>
        <!--buscar inprimir -->
        <form class="form-inline" action="index.html" method="post">
            <div class="container">
                <div class=" row col-lg-12">
                    <h3 class="bg-success text-center" >Datos del Paciente</h3>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="form-group">
                    <label class="control-label"for="">Id  :</label>
                    <input class="form-control"type="text" name="id_mostrar" readonly  value="<?php echo $row['id'];?>">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label"for="">Nombre :</label>
                    <input  class="form-control"type="text" name="nombre_mostrar" readonly  value="<?php echo $row['nombre'];?>">
                </div>
                <div class="form-group">
                    <label class="control-label"for="">ApellidoP :</label>
                    <input class="form-control" type="text" name="apellidoP_mostar" readonly  value="<?php echo $row['apellidoP'];?>">
                </div>
                <div class="form-group">
                    <label class="control-label"for="">ApellidoM :</label>
                    <input class="form-control" type="text" name="ApellidoM_mostar" readonly  value="<?php echo $row['apellidoM'];?>">
                </div>
                <div class="form-group">
                    <label class="control-label"for="">edad :</label>
                    <input class="form-control" type="text" name="nacimiento_mostar"
                      readonly value="<?php echo $row['nacimiento'];?>">
                </div>
            </div>

        </form>
        <br>
    <div class="table-responsive">
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Agregar
         <span class="glyphicon glyphicon-plus"></span>
     </button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
          <th width="5%">Id</th>
          <th width="10%">Feha</th>
          <th width="10%">Hora</th>
          <th width="5%">Peso</th>
          <th width="5%">Estatura</th>
          <th width="35%">Observaciones</th>
          <th width="10%">Doctor_id</th>
          <th width="10%">Paciente_id</th>
          <th width="10%">Consultorio_id</th>

      </tr>
     </thead>
    </table>
    </div>
    </div>
    <br>
  </body>
</html>
<!--ingresar y modificar -->
<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Añadir Cita</h4>
    </div>
    <div class="modal-body">
     <label>fecha</label>
     <input type="date" class="form-control" name="fecha"  id="fecha" value="<?php  echo date("Y-m-d"); ?>" required>
     <br />
     <label>hora</label>
     <input type="text" class="form-control" name="hora"  id="hora" value="<?php  date_default_timezone_set('America/Mexico_City');
     setlocale(LC_TIME, 'es_MX.UTF-8');
     $hora_actual=strftime("%H:%M:%S");
     echo $hora_actual; ?>" required>
     <br>
     <div class="form-group">
         <label class="control-label col-lg-1">peso</label>
         <div class="col-lg-4">
             <input type="text" class="form-control" name="peso"  id="peso" value="" required>
         </div>
         <label for="">KG</label>
     </div>
      <br>
      <br>
      <div class="form-group">
          <label class="control-label col-lg-1">Altura</label>
          <div class="col-lg-4">
              <input type="text" class="form-control" name="estatura"  id="estatura" value="" required>
          </div>
          <label for="">CM</label>
      </div>
     <br>
     <br>

     <label>observaciones</label>
    <textarea  class ="form-control" name="observaciones" id="observaciones" rows="5" cols="5" ></textarea>
    <br>
    <div class="form-gorup">
        <label class="control-label col-lg-2">id_doctor</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" name="doctor_id"  id="doctor_id" value="<?php echo $_SESSION['id'];?>" required>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label class="control-label  col-lg-2">id_paciente</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" name="paciente_id"  id="paciente_id" value="<?php echo $row['id'];?>" required>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label class="control-label col-lg-3">id_consultorio</label>
        <div class="col-lg-4">
                <input type="text" class="form-control" name="consultorio_id"  id="consultorio_id" value="" required>
        </div>
    </div>
    <br>
 </div>
    <div class="modal-footer">
     <input type="hidden" name="status"  id="status" value="Activo">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
   </div>
  </form>
 </div>
</div>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Agregar Cita");
  $('#action').val("Add");
  $('#operation').val("Add");
  //$('#user_uploaded_image').html('');
 });

 var dataTable = $('#user_data').DataTable({//tabla
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchCita.php",//traer todo los datos
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[],//columnas en las que son botones o imagenes
    "orderable":false,
   },
  ],

 });

//ingresar datos a la bd REGISTRAR
 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var fecha = $('#fecha').val();
  var hora = $('#hora').val();
  var peso = $('#peso').val();
  var estatura = $('#estatura').val();
  var observaciones = $('#observaciones').val();
  var doctor_id = $('#doctor_id').val();
  var paciente_id = $('#paciente_id').val();
  var consultorio_id = $('#consultorio_id').val();


  if(fecha != '' && hora != ''  && peso != '' && estatura != '' && doctor_id != '' && paciente_id != '' && consultorio_id != ''){
   $.ajax({
    url:"insertCita.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data){
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");

  }
 });
/*
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_singleCita.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#fecha').val(data.fecha);
    $('#hora').val(data.hora);
    $('#peso').val(data.peso);
    $('#estatura').val(data.estatura);
    $('#observaciones').val(data.observaciones);
    $('#doctor_id').val(data.doctor_id);
    $('#paciente_id').val(data.paciente_id);
    $('#consultorio_id').val(data.consultorio_id);


    $('.modal-title').text("Edit Cita");
    $('#user_id').val(user_id);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
*/
/*
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Quiere borrar?"))
  {
   $.ajax({
    url:"deleteCita.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false;
  }
});*/
});
/*
function newcita(paciente){
    $('#myModal2').modal('show');
    console.log(paciente);
}*/
</script>

<?php
}else{
  header ('location:login.php');
}
?>
