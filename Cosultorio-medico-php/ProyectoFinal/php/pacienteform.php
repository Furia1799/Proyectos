<?php
session_start();
if(isset($_SESSION['id'])){
include 'totalPacientes.php'
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
    <title>Paciente</title>
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
                      <li class="active"  id="pacientes"><a href="pacienteform.php">PACIENTES</a></li>
                      <li id="consultorios" ><a href="consultorioform.php">CONSULTORIOS</a></li>
                      <li  id="citas"><a href="citaform.php">CITAS</a></li>
                      <li id="expediente"><a href="expedienteform.php">EXPEDIENTE</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span>SALIR</a></li>
                    </ul>
                  </div>
                </nav>


<!--Titulo-->
<br>
    <div id="caja" class="container box">
        <div class="page-header">
            <h1 id="sub" class="text-center">PACIENTES
        </div>
    <br>
    <div class="">
        <h3 class="bg-success col-lg-4">Obtener total de Pacientes</h3>
    </div>
    <br><br><br><br>
    <!--Funcion-->
    <div class="form-inline">
        <form action="pacienteform.php" method="POST">
            <div class="form-group">
                <button  class="btn btn-success" type="submit" name="btn_total" value="1">Calcular</button>
                <input class="form-control" type="text" name="mostar_total" readonly value="<?php echo $total; ?> ">
            </div>
        </form>
    </div>

    <!--Tabla-->
    <br>
    <div class="table-responsive">
    <br>
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Agregar
         <span class="glyphicon glyphicon-plus"></span>
     </button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
          <!--contar con 95%-->
          <th windth="5%">Id</th>
          <th width="5%">Nombre</th>
          <th width="10%">ApellidoP</th>
          <th width="10%">ApellidoM</th>
          <th width="5%">Nacimiento</th>
          <th width="10%">Email</th>
          <th width="10%">Pwd</th>
          <th width="5%">Cel</th>
          <th width="5%">Status</th>
          <th width="5%">Genero</th>
          <th width="5%">Edit</th>
          <th width="5%">Delete</th>
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
     <h4 class="modal-title">Agregar Pacientes</h4>
    </div>
    <div class="modal-body">
     <label>Nombre</label>
     <input type="text" name="nombre" id="nombre" class="form-control" maxlength="25" minlength="3" placeholder="Ingrese su Nombre" pattern="[A-Z a-z]+" title="Solo letras del alfabeto" required />
     <br />
     <label>Apellido Paterno</label>
     <input type="text" name="apellidoP" id="apellidoP" class="form-control" maxlength="20" minlength="3" placeholder="Ingrese su Apellido Paterno" pattern="[A-Z a-z]+" title="Solo letras del alfabeto" required/>
     <br />
     <label>Apellido Materno</label>
     <input type="text" name="apellidoM" id="apellidoM" class="form-control" maxlength="20" minlength="3" placeholder="Ingrese su Apellido Materno" pattern="[A-Z a-z]+" title="Solo letras del alfabeto" required/>
     <br />
     <label> Fecha de nacimiento</label>
     <input type="date" name="nacimiento" id="nacimiento" class="form-control" min="1919-01-01" max="2050-12-31" required />
     <br>
     <label>Email</label>
     <input type="text" name="email" id="email" class="form-control" maxlength="" minlength="3" placeholder="Ingrese su Email"  title="Solo letras del alfabeto" required />
     <br>
     <label>Contraseña</label>
     <input type="password" name="pwd" id="pwd" class="form-control "maxlength="20" minlength="3" placeholder="Ingrese su Contraseña"  required />
     <br>
     <label>Numero celular</label>
     <input type="text" name="cel" id="cel" class="form-control" maxlength="10" minlength="10" placeholder="Ingrese su Numero Celular" pattern="[0-9]+" title="Solo numeros " required />
     <br>
     <label>Genero</label><br>
     <!--<input type="radio" name="genero" id="genero" value="Hombre" checked >Hombre
     <input type="radio" name="genero" id="genero" value="Mujer" >Mujer-->
     <input type="text" name="genero" id="genero" class="form-control" maxlength="20" minlength="3" placeholder="Ingrese su Genero" pattern="[A-Z a-z]+" title="Solo letras del alfabeto" required />
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
  $('.modal-title').text("Agregar Pacientes");
  $('#action').val("Add");
  $('#operation').val("Add");
  //$('#user_uploaded_image').html('');
 });

 var dataTable = $('#user_data').DataTable({//tabla
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchPaciente.php",//traer todo los datos
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[9,10],//columnas en las que son botones o imagenes
    "orderable":false,
   },
  ],

 });

//ingresar datos a la bd REGISTRAR
 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var nombre = $('#nombre').val();
  var apellidoP = $('#apellidoP').val();
  var apellidoM = $('#apellidoM').val();
  var nacimiento = $('#nacimiento').val();
  var email = $('#email').val();
  var pwd = $('#pwd').val();
  var cel = $('#cel').val();
  var status= "Activo";
  var genero = $('#genero').val();



  if(nombre != '' && apellidoP != '' && apellidoM != '' && nacimiento != '' && email != '' && pwd != '' && cel != '' && status != '' && genero != '' ){
   $.ajax({
    url:"insertPaciente.php",
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

 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("paciente_id");
  $.ajax({
   url:"fetch_singlePaciente.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#nombre').val(data.nombre);
    $('#apellidoP').val(data.apellidoP);
    $('#apellidoM').val(data.apellidoM);
    $('#nacimiento').val(data.nacimiento);
    $('#email').val(data.email);
    $('#pwd').val(data.pwd);
    $('#cel').val(data.cel);
    $('#genero').val(data.genero);

    $('.modal-title').text("Editar Paciente");
    $('#user_id').val(user_id);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });


 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("paciente_id");
  if(confirm("Quiere borrar?"))
  {
   $.ajax({
    url:"deletePaciente.php",
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
 });
});

function newcita(paciente){
    $('#myModal2').modal('show');
    console.log(paciente);
}
</script>
<?php
}else{
  header ('location:login.php');
}
?>
