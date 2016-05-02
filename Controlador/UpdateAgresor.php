<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    $id=$_POST['id'];
    $seguridad_social=$_POST['seguridad_social'];
    $nombre=$_POST['nombre'];
    $apellido_p=$_POST['apellido_p'];
    $apellido_m=$_POST['apellido_m'];
    $fecha_nac=$_POST['fecha_nac'];
    $genero=$_POST['genero'];
    $direccion=$_POST['direccion'];
    $educacion=$_POST['educacion'];
    $etnia=$_POST['etnia'];
    $religion=$_POST['religion'];

$query="UPDATE infractor ".
    "SET nombres='$nombre', apellido_paterno='$apellido_p', apellido_materno='$apellido_m', fecha_nacimiento='$fecha_nac', ".
    "genero='$genero', direccion='$direccion', educacion='$educacion', etnicidad='$etnia', religion='$religion' ".
    "WHERE id_infractor='$id';";


    $update = mssql_query($query);
    header("Location: ../BuscarAgresor.php?s=eua");

?>