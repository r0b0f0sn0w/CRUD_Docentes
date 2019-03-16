<?php

include ("conexion.php");

$sql = "select Estudiante.matricula,Estudiante.nombres as 'nombresEst',Estudiante.apPaterno,Estudiante.apMaterno,Grupo.descripcion as 'grupo',empresa.nombre as'empresa',docente.nombre_docente,docente.apellido_pat,docente.apellido_mat from Estudiante inner join Grupo on Estudiante.idGrupo=Grupo.idGrupo inner join docente on Grupo.id_docente=docente.id_docente inner join tipo_docente on docente.id_tipo_docente =tipo_docente.id_tipo_docente inner join docente as doc on tipo_docente.id_tipo_docente=doc.id_tipo_docente inner join Grupo as gr on doc.id_docente=gr.id_docente inner join Estudiante as est on gr.idGrupo=est.idGrupo inner join proyecto on est.id_Alumno=proyecto.id_alumno inner join empresa on proyecto.id_empresa=empresa.id_empresa;";

$arregloActividades = traerDatos($sql);
foreach ($arregloActividades as $item) {
    $matricula = $item['matricula'];
    $nombresEst= $item['nombresEst'];
    $apPaterno= $item['apPaterno'];
    $apMaterno= $item['apMaterno'];
    $grupo = $item['grupo'];
    $empresa = $item['empresa'];
    $nombre_docente = $item['nombre_docente'];
    $apellido_pat = $item['apellido_pat'];
    $apellido_mat = $item['apellido_mat'];
    echo <<<XD
	<tr>
        <td>$matricula</td>
        <td>$nombresEst</td>
	    <td>$apPaterno</td>
	    <td>$apMaterno</td>
	    <td>$grupo</td>
	    <td>$empresa</td>
	    <td>$nombre_docente</td>
	    <td>$apellido_pat</td>
	    <td>$apellido_mat</td>
        </tr>
XD;
}