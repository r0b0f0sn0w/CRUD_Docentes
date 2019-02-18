<?php
include ("conexion.php");
$id = $_POST['id_docente'];
$sql = "CALL SP_LEER_DOCENTE($id);";
$docente = traerDatos($sql);
$js = json_encode($docente);
echo $js;
?>