<?php 
//RECUERDA MODIFICAR EL freetds.conf en xamppfiles/etc para modificar los atributos de conexion a la base

$usuario ="david";
$password = "coloquialmente10";
$direccion = "bda";
$basedatos = "SistemaJudicial";

$conexion = mssql_connect($direccion, $usuario, $password);
if (!$conexion) {
    die('Error de conexion: ' . mssql_get_last_message());
}

$base = mssql_select_db($basedatos, $conexion);
if (!$base) {
  die ('No fue posible alcanzar la base de datos: ' . mssql_get_last_message());
}

?>