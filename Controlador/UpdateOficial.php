<?php 
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    $id=$_POST['secreto_oficial'];
    $num_id=$_POST['identificacion'];
    $nombre=$_POST['nombre'];
    $apellido_p=$_POST['apellido_p'];
    $apellido_m=$_POST['apellido_m'];
    $perfil=$_POST['perfil'];
    $rol=$_POST['rol'];

$query="UPDATE oficial ".
    "SET numero_institucion='$num_id',nombres='$nombre', apellido_paterno='$apellido_p',".
    "apellido_materno='$apellido_m', perfil='$perfil', rol='$rol' ".    
    "WHERE id_oficial='$id';";

echo $query;

    $update = mssql_query($query);
    header("Location: ../BuscarOficial.php?s=euo");

?>