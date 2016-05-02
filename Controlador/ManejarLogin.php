<?php

session_start();
//recibe el nombre de usuario y contraseña
$username = $_POST['usuario'];
$_SESSION['username'] = $username;
$password_usuario = $_POST['password'];

if(empty($password_usuario) OR empty($username)){
    header("Location: ../Login.php?e=1");
}else{
    include('connectar.php');    
    include('Encriptar.php');

    $result = mssql_query("SELECT * FROM usuario where usuario='$username'");
    if (!mssql_num_rows($result)) {
        header("Location: ../Login.php?e=2");
    } else {      
        $result2=mssql_fetch_assoc($result);                
        if ($password_usuario==desencriptar($result2['password'])){
            //asigna las variables de sesión 
            $_SESSION['usuario']=$result2['usuario'];
            $_SESSION['password']=$result2['password'];
            $_SESSION['esAdmin']=$result2['esAdmin'];
            header("Location: ../index.php");            
        }else{                                          
            header("Location: ../Login.php?e=2");
        }
    }
}
?>
