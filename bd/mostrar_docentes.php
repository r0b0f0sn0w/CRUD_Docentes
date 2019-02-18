<?php

include ("conexion.php");

$sql = "SELECT * FROM VISTA_TODOS_DOCENTES;";

$arregloActividades = traerDatos($sql);
foreach ($arregloActividades as $item) {
    $id = $item['id_docente'];
    $nombre = $item['nombre_docente'];
    $appat = $item['apellido_pat'];
    $apmat = $item['apellido_mat'];
    $matricula = $item['matricula'];
    $correo = $item['correo_electronico'];
    $fecha = $item['fecha_nacimiento'];
    $tipo = $item['tipo'];
    
    echo <<<XD
	<tr>
        <td>$nombre</td>
        <td>$appat</td>
	    <td>$apmat</td>
	    <td>$matricula</td>
	    <td>$correo</td>
	    <td>$fecha</td>
	    <td>$tipo</td>
            <td>
		<button type='button' class='btn btn-warning'style="color: white;" id='editar' onclick='editar($id)'>Editar</button>
		<button type='button' class='btn btn-danger' id='eliminar' onclick='eliminar($id)'>Eliminar</button>
	    </td>
        </tr>
XD;
}