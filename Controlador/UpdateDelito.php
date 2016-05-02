<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    $id=$_POST['secreto_delito'];
    $tipo=$_POST['tipo_delito'];
    $nombre=$_POST['nombre_delito'];
    $desc=$_POST['descripcion'];

$query="UPDATE catalogo_crimen ".
    "SET tipo_crimen='$tipo',nombre_crimen='$nombre', descripcion='$desc' ".
    "WHERE id_crimen='$id';";
    
//    echo $query;

    $update = mssql_query($query);
    header("Location: ../BuscarDelito.php?s=eud");

?>