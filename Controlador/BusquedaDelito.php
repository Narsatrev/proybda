<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}

include('connectar.php');
$datos_busqueda=$_POST['datos_busqueda'];

$query= "SELECT id_crimen,nombre_crimen FROM catalogo_crimen WHERE nombre_crimen LIKE '%".$datos_busqueda."%';";
$select= mssql_query($query);

$res="";
if (!mssql_num_rows($select)) {
    echo 'sin_resultados';
} else {
    while ($row = mssql_fetch_array($select)) {
        $res.=$row[0]."###".$row[1]."***";
    }
}

echo $res;


?>