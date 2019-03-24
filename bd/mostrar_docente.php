<?php
include ("conexion.php");
$id = $_POST['id_docente'];
$sql = "SELECT docente.id_docente,docente.nombre_docente,docente.apellido_pat,docente.apellido_mat,docente.matricula,docente.correo_electronico,docente.password,docente.fecha_nacimiento,tipo_docente.tipo,docente.estado from docente inner join tipo_docente on docente.id_tipo_docente=tipo_docente.id_tipo_docente WHERE id_docente=$id;";
$docente = traerDatos($sql);
$js = json_encode($docente);
echo $js;
?>