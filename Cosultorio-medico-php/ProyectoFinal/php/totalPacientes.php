<?php

include('db.php');
$total=null;
$result=null;

if(isset($_POST["btn_total"])){

    $sql="SELECT getTotalUsuarios() AS usuarios";
    $statement=$connection->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll();
    $total= $result[0]['usuarios'];
    //print_r ($result[0]['usuarios']);
}
 ?>
