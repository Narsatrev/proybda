<?php
session_start();
if($_SESSION['username']==""){
    header("Location: ../Login.php");
}
function encriptar($password){
    $metodo = "AES-256-CBC";
    $llave_k="aaPlCDHk2Q69M0tf1L4ZDPTMWh88Wtaa";
    $vector_k = "zhongguorenminbishitai";
    $p_enc='';
    $llave_z = hash('sha256', $llave_k);
    $vector_z = substr(hash('sha256', $vector_k), 0, 16);
    $p_enc = openssl_encrypt($password, $metodo, $llave_z, 0, $vector_z);
    $p_enc = base64_encode($p_enc);
    return $p_enc;
}

function desencriptar($password){
    $metodo = "AES-256-CBC";
    $llave_k="aaPlCDHk2Q69M0tf1L4ZDPTMWh88Wtaa";
    $vector_k = "zhongguorenminbishitai";
    $llave_z = hash('sha256', $llave_k);
    $vector_z = substr(hash('sha256', $vector_k), 0, 16);
    $p_denc = openssl_decrypt(base64_decode($password), $metodo, $llave_z, 0, $vector_z);
    return $p_denc;
}

?>