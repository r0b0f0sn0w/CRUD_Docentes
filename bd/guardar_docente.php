<?php

include ("conexion.php");

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

$password='UTCDocente';

$estado='1';

$sql = "insert into docente (nombre_docente,apellido_pat,apellido_mat,matricula,correo_electronico,password,fecha_nacimiento,id_tipo_docente,estado) values('$nombre','$appat','$apmat','$matricula','$correo','$password','$fecha','$tipo','$estado');";

if (guardarDatos($sql)) {
    echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Correcto!</strong> El docente fue agregado correctamente.</div>";
} else {
    echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Error!</strong> No fue posible agregar al docente.</div>";
}