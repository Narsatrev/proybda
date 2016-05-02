<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
//recibe la información de la forma
$usuario_2=$_POST['usuario'];
$pass_texto=$_POST['password'];
$esAdmin=$_POST['esAdmin'];

include('connectar.php');    
include('Encriptar.php');  

$password = encriptar($pass_texto);
$query="SELECT * FROM usuario WHERE usuario='$usuario_2';";
$resultado = mssql_query($query);
if (mssql_num_rows($resultado)==0) {
    $query="INSERT INTO usuario(esAdmin,usuario,password)".
                           " VALUES('$esAdmin','$usuario_2','$password');";
    $result = mssql_query($query);
    echo $query;
    header("Location: ../index.php?e=ure");
}else{
    echo "sheller"." ".$query;
//    header("Location: ../AgregarUsuario.php?e=r");
}


    

?>