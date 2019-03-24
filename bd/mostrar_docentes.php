<?php

include ("conexion.php");

$sql = "select `docente`.`id_docente` AS `id_docente`,`docente`.`nombre_docente` AS `nombre_docente`,`docente`.`apellido_pat` AS `apellido_pat`,`docente`.`apellido_mat` AS `apellido_mat`,`docente`.`matricula` AS `matricula`,`docente`.`correo_electronico` AS `correo_electronico`,`docente`.`fecha_nacimiento` AS `fecha_nacimiento`,`tipo_docente`.`tipo` AS `tipo` from (`docente` join `tipo_docente` on((`docente`.`id_tipo_docente` = `tipo_docente`.`id_tipo_docente`))) where (`docente`.`estado` = 1) ;";

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
		<button type='button' class='btn btn-sm btn-warning'style="color: white;" id='editar' onclick='editar($id)'>Editar</button>
		<button type='button' class='btn btn-sm btn-danger' id='eliminar' onclick='eliminar($id)'>Eliminar</button>
	    </td>
        </tr>
XD;
}