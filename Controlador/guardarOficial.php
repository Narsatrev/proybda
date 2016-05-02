<?php

session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido_p=$_POST['apellido_p'];
    $apellido_m=$_POST['apellido_m'];
    $perfil=$_POST['perfil'];
    $rol=$_POST['rol'];

    $query="INSERT INTO oficial(numero_institucion,nombres,apellido_paterno,apellido_materno, perfil,rol) ".
        "VALUES('$id','$nombre','$apellido_p','$apellido_m','$perfil','$rol');";

    $insertar = mssql_query($query);
    if(!$insertar){
        header("Location: ../index.php?s=fro");
    }else{
        header("Location: ../index.php?s=exo");
    }
?>