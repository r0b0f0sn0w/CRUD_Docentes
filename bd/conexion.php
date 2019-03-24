<?php
/*function conectarBD() {
    $conexion = mysqli_connect("localhost", "root", "", "utcbis");
    return $conexion;
} */

/*
function conectarBD() {
    $conexion = mysqli_connect("sql173.main-hosting.eu", "u969154419_grupo", "inicio01", "u969154419_grupo");
    return $conexion;
}
*/
function conectarBD() {
    $conexion = mysqli_connect("192.168.1.105", "root", "imroot", "u969154419_grupo");
    return $conexion;
}
//$sent="CREATE VIEW vista_todos_docentes  AS  select `docente`.`id_docente` AS `id_docente`,`docente`.`nombre_docente` AS `nombre_docente`,`docente`.`apellido_pat` AS `apellido_pat`,`docente`.`apellido_mat` AS `apellido_mat`,`docente`.`matricula` AS `matricula`,`docente`.`correo_electronico` AS `correo_electronico`,`docente`.`fecha_nacimiento` AS `fecha_nacimiento`,`tipo_docente`.`tipo` AS `tipo` from (`docente` join `tipo_docente` on((`docente`.`id_tipo_docente` = `tipo_docente`.`id_tipo_docente`))) where (`docente`.`estado` = 1) ;";
//$sent="select * from ";
//guardarDatos($sent);

function desconectarBD($conexion) {
    $cerrarConexion = mysqli_close($conexion);
    return $cerrarConexion;
}

function guardarDatos($sql) {
    $conexion = conectarBD();
    mysqli_query($conexion, "set names 'utf8'");
    if (!$resultado = mysqli_query($conexion, $sql)) die();
    desconectarBD($conexion);
    return true;
}

function traerDatos($sql) {
    $conexion = conectarBD();
    mysqli_query($conexion, "set names 'utf8'");
    if (!$resultado = mysqli_query($conexion, $sql)) die();
    $arregloDatos = array();
    $i = 0;
    while ($fila = mysqli_fetch_array($resultado)) {
	$arregloDatos[$i] = $fila;
	$i++;
    }
    desconectarBD($conexion);
    return $arregloDatos;
}
?>