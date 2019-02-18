<?php

include ("conexion.php");

$id = $_POST['id_docente'];
$sql = "CALL SP_ELIMINAR_DOCENTE($id);";

if (guardarDatos($sql)) {
    echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Correcto!</strong> El docente fue eliminada con éxito.</div>";
} else {
    echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Error!</strong> No fue posible eliminar al docente.</div>";
}