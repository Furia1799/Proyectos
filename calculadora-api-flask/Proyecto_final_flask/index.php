<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <title>API CALCULADORA</title>
</head>
<body>
<?php

if (isset($_POST['submit'] )){
    $archivo = $_FILES['archivo'];


    if (isset($_POST['operacion']) && !empty($_POST['operacion']) || isset($_FILES['archivo']) && $_FILES['archivo']['name'] != null){
        if(!empty($_POST['operacion'])){
            $operacion = $_POST['operacion'];
            $operacion_array = array('operaciones'=>array(array('operacion' => $operacion)));
            $request = json_encode($operacion_array);
        }else{
            $json_archivo_2 = json_decode(file_get_contents($_FILES['archivo']["tmp_name"]),true);
            $request = file_get_contents($_FILES['archivo']["tmp_name"]);
        }

        $url = "http://127.0.0.1:5000/calcular";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json_response = json_decode($response,true);

    }else{
        echo "Ingrese una operacion en el campo o un Archivo";
    }
}
?>
    <div class="container" id="cuerpo">
        <div class="row">
            <div class="col-lg-12" id="titulo">
                <h1 class="jumbotron">OPERACIONES ARITMETICAS</h1>
            </div>
        </div>
        <div class="row">
            <div  class="col-lg-12" id="formulario">
                <form action="index.php" method="post" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="operacion" class="text-center" >Ingrese la operacion a realizar :</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="operacion" class="form-control" placeholder="Ingresar operacion">
                        </div>
                    </div>
                    <br>
                    <h2 > O </h2>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="archivo"  >Cargar archivo JSON con operaciones :</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="file" name="archivo" accept=".json" class="btn btn-secondary" class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" value="Obtener Resultado" class="btn btn-primary">
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div  class="col-lg-12" id="request">
                <h2 class="display-4" >Request Generado:</h2><br>
                <?= $request ?? "" ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12" id="replay">
                <h2 class="display-4">Replay cadena:</h2><br>
                <?= $response ?? "" ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12" id="resultados">
                <h2 class="display-4">Resultado de la operacion:</h2>
                <?php
                if(isset($json_response)){
                    $i = 1;
                    foreach ($json_response['operaciones'] as $operacion) {
                        echo "Operacion " . $i . "  ";
                        echo  $operacion['error'] ?? "";
                        echo " ----->  Resultado :" . $operacion['resultado'] ?? "";
                        $i++;
                        echo "<br>";
                    }
                }

                function descargar_archivo($json_response){
                    $json_response = $json_response;
                    if (isset($json_response) && !empty($json_response)){
                        $json_archivo = json_encode($json_response);
                        $ruta_archivo = 'C:\Users\Furia\Desktop\Resultados.json';
                        file_put_contents($ruta_archivo, $json_archivo);
                        return "Descarga EXITOSA " . " " . $ruta_archivo;
                    }else{
                        return "ERROR en la Descarga";
                    }
                }
                ?>
            </div>
            <script type="text/javascript">
                function Descargar(){
                    alert("<?= descargar_archivo($json_response); ?>");
                }
            </script>
        </div>
        <div class="row">
            <div class="col-lg-12" id="descarga">
                <h2 class="display-4">Archivo JSON </h2>
                <input type="button" value="Descargar JSON" form="formulario1" onclick="Descargar()"
                       class="btn btn-warning">
            </div>
        </div>
    </div>
</body>
</html>

