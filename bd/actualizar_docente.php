<?php

include ("conexion.php");

$id = $_POST['id_docente'];

$tempnom = $_POST['nombre'];
$nombre = trim($tempnom);//elimina espacios que agrega js

$tempappat = $_POST['appat'];
$appat = trim($tempappat);

$tempapmat = $_POST['apmat'];
$apmat = trim($tempapmat);

$tempmat = $_POST['matricula'];
$matricula = trim($tempmat); 

$tempcorreo = $_POST['correo'];
$correo = trim($tempcorreo);

$tempfecha = $_POST['fecha'];
$fecha = trim($tempfecha);

$tipo= $_POST['tipo'];

$sql = "call SP_ACTUALIZAR_DOCENTE('$id','$nombre','$appat','$apmat','$matricula','$correo','$fecha','$tipo');";


if (guardarDatos($sql)) {
    echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Correcto!</strong> EL docente fue actualizado correctamente.</div>";
} else {
    echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Error!</strong> No fue posible actualizar los datos del docente.</div>";
}