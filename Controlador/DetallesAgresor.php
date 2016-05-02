<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
    include('connectar.php');
    
    $id=$_POST['id'];

    $query="SELECT * FROM infractor WHERE id_infractor='$id'".
    $str_res="";
    $select = mssql_query($query);
    if (!mssql_num_rows($select)) {
        echo 'ERROR!';
    } else {
        $i=0;
        $row = mssql_fetch_array($select);
        while($i<11){
            $str_res.=$row[$i]."###";    
            $i=$i+1;
        }
    }

    echo $str_res;

?>