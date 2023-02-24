<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><!--JQuery-->
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="page-header text-center  col-lg-12">
                <h1>LOGIN</h1>
            </div>
            <br>
            <form class="form-horizontal" action="procesos.php" method="post">
                <div class="container">
                    <div class=" form-group ">
                        <div class="col-lg-4 col-lg-offset-5">
                            <img src="imagenes/login.png" alt="login" class="img-rounded" width="170" height="150">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-lg-1 col-lg-offset-3"for="">Email</label>
                        <div class="col-lg-4">
                            <input class="form-control " type="text" name="email" value="" required placeholder="Ingrese su Correo Electronico">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-lg-1 col-lg-offset-3"for="">Contraseña</label>
                        <div class="col-lg-4">
                            <input  class="form-control" type="password" name="pwd" value="" required placeholder="Ingrese su contraseña">
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-4">
                        <button  class="btn btn-info"type="submit" name="button">Login</button>
                        <button type="button"  class="btn btn-danger" name="button">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
