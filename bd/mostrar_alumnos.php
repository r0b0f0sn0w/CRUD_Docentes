<?php

include ("conexion.php");

$sql = "SELECT * FROM alumno;";

$arregloActividades = traerDatos($sql);
foreach ($arregloActividades as $item) {
    $nombre = $item['nombre'];
    $appat = $item['apellido_paterno'];
    $apmat = $item['apellido_'];
    $matricula = $item['matricula'];
    $correo = $item['carrera'];
    $fecha = $item['grupo'];
    
    echo <<<XD
	<tr>
        <td>$nombre</td>
        <td>$appat</td>
	    <td>$apmat</td>
	    <td>$matricula</td>
	    <td>$correo</td>
	    <td>$fecha</td>
        </tr>
XD;
}