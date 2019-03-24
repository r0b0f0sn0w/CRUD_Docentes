<?php

include ("conexion.php");

$sql = "select Estudiante.matricula as 'Matricula',Estudiante.nombres as 'NombreEst' ,Estudiante.apPaterno as 'AppPatEst',Estudiante.apMaterno as 'AppMatEst',Grupo.descripcion as 'Grupo',docente.nombre_docente as 'NombreDoc',docente.apellido_pat as 'AppPatDoc',docente.apellido_mat as 'AppMatDoc',tipo_docente.tipo as 'tipo' from Estudiante left join Grupo on Estudiante.idGrupo=Grupo.idGrupo left join docente on Grupo.id_docente=docente.id_docente left join tipo_docente on docente.id_tipo_docente =tipo_docente.id_tipo_docente;";

$arregloActividades = traerDatos($sql);
foreach ($arregloActividades as $item) {
    $Matricula = $item['Matricula'];
    $NombreEst= $item['NombreEst'];
    $AppPatEst= $item['AppPatEst'];
    $AppMatEst= $item['AppMatEst'];
    $Grupo = $item['Grupo'];
    $NombreDoc = $item['NombreDoc'];
    $AppPatDoc = $item['AppPatDoc'];
    $AppMatDoc = $item['AppMatDoc'];
    $tipo = $item['tipo'];
    echo <<<XD
	<tr>
        <td>$Matricula</td>
        <td>$NombreEst</td>
	    <td>$AppPatEst</td>
	    <td>$AppMatEst</td>
	    <td>$Grupo</td>
	    <td>$NombreDoc</td>
	    <td>$AppPatDoc</td>
	    <td>$AppMatDoc</td>
	    <td>$tipo</td>
        </tr>
XD;
}