<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    
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

    $query="INSERT INTO infractor(numero_ss,nombres,apellido_paterno,apellido_materno,".
        "fecha_nacimiento,genero,direccion,educacion,etnicidad,religion) ".
        "VALUES('$seguridad_social','$nombre','$apellido_p','$apellido_m',".
        "'$fecha_nac','$genero','$direccion','$educacion','$etnia','$religion');";
    
    $insertar = mssql_query($query);
    if(!$insertar){
        header("Location: ../index.php?s=frc");
    }else{
        header("Location: ../index.php?s=exi");
    }

?>