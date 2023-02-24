<?php
//mostar los datos de la tabla
include('db.php'); //base de datos archivo
include('functionCita.php');//funciones de archivos
$query = '';
$output = array();
$query .= "SELECT * FROM expediente "; //query de bd

if(isset($_POST["search"]["value"])){ //buscar por un solo
 $query .= 'WHERE id_expediente LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR cita_id LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"])){ //
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}else{
    $query .= 'ORDER BY id_expediente DESC '; //no entran a nada
}
if($_POST["length"] != -1){
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array(); //crear agregar
$filtered_rows = $statement->rowCount();//filas contar
foreach($result as $row)
{

 $sub_array = array();//trar variables
 //$sub_array[] = $image;
 $sub_array[] = $row["id_expediente"];
 $sub_array[] = $row["cita_id"];

/*
 $sub_array[] = '<button type="button"  name="update" id="'.$row["id"].'" id="update'.$row["id"].'"class=" update btn btn-warning glyphicon glyphicon-pencil"></button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" id="delete'.$row["id"].'" class=" delete btn btn-danger glyphicon glyphicon-remove"></button>';*/
 $data[] = $sub_array;
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data);
echo json_encode($output);

 ?>
