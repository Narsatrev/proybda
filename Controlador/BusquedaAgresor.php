<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}

    include('connectar.php');
    $datos_busqueda=$_POST['datos_busqueda'];

$query= "SELECT id_infractor,nombres,apellido_paterno,apellido_materno FROM infractor WHERE nombres".
    " LIKE '%".$datos_busqueda."%' OR apellido_paterno LIKE '%".$datos_busqueda."%' OR apellido_materno LIKE '%".$datos_busqueda."%';";
$select= mssql_query($query);


$res="";
if (!mssql_num_rows($select)) {
    echo 'sin_resultados';
} else {
    while ($row = mssql_fetch_array($select)) {
        $res.=$row[0]."###".$row[1]."###".$row[2]."###".$row[3]."***";
    }
}

echo $res;


?>