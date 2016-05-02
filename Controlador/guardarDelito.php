<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    
    $tipo_crimen=$_POST['tipo_delito'];
    $nombre_delito=$_POST['nombre_delito'];
    $descripcion=$_POST['descripcion'];

    $query="INSERT INTO catalogo_crimen(tipo_crimen,nombre_crimen,descripcion) ".
        "VALUES('$tipo_crimen','$nombre_delito','$descripcion');";

    $insertar = mssql_query($query);
    if(!$insertar){
        header("Location: ../index.php?s=frc");
    }else{
        header("Location: ../index.php?s=exc");
    }
?>