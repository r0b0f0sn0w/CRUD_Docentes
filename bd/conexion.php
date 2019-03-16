<?php
/*
function conectarBD() {
    $conexion = mysqli_connect("localhost", "root", "", "utcbis");
    return $conexion;
} */

function conectarBD() {
    $conexion = mysqli_connect("sql173.main-hosting.eu", "u969154419_grupo", "Estadias2019", "u969154419_grupo");
    return $conexion;
}

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