<?php
    session_start();
    $nomina=$_SESSION['Nomina'];
    $esAdmin=$_SESSION['esAdmin'];
    
if($nomina!=""&&$esAdmin==1){
    //Si al menos hay una pregunta
    if(count($_POST)>5){
        include '../conexion_base.php';
        $nombre_formulario=mysqli_real_escape_string($conexion,$_POST['nombre_formulario']);
        $fecha_inicio=mysqli_real_escape_string($conexion,$_POST['fecha_inicio']);
        $fecha_fin=mysqli_real_escape_string($conexion,$_POST['fecha_fin']);
        $instrucciones=mysqli_real_escape_string($conexion,$_POST['instrucciones']);   
        
        //recuperar id usuario
        $query="SELECT idusuario FROM usuario WHERE nomina='".$nomina."';";            
        $res_usuario_id=mysqli_query($conexion,$query) 
            or die ("Error: ".mysqli_error($conexion));        
        $resultado= mysqli_fetch_assoc($res_usuario_id);
        $id_usuario=$resultado['idusuario'];
        
        //insertar valores del formuario
        $query="INSERT INTO formulario(fecha_inicio,fecha_fin,nombre,instrucciones,usuario_idusuario)".
            " VALUES('".$fecha_inicio."','".$fecha_fin."','".$nombre_formulario."','".$instrucciones."','".$id_usuario."');";        
        $resultado_=mysqli_query($conexion,$query) 
            or die ("Error: ".mysqli_error($conexion));
        $id_formulario=mysqli_insert_id($conexion);
        
        if($id_formulario>=0){
            $texto="";
            $tipo="";
            $numero_pregunta="";
            $texto_opcion="";
            foreach ($_POST as $param_name => $param_val){
//                echo "PARAM NAME: ".$param_name." PARAM VAL: ".$param_val."<br/>";                                
                if(strrpos($param_name,"pregunta_")>-1){
//                    echo "entro pregunta</br>";
                    $numero_pregunta=explode("_",$param_name)[1]+1;
                    $texto=mysqli_real_escape_string($conexion,$param_val);                    
                }                
                if(strrpos($param_name,"tipo_preg_")>-1){
//                    echo "entro tipo_pregunta</br>";
                    $tipo=mysqli_real_escape_string($conexion,$param_val);                    
                }
                                
                if($texto!=""&&$tipo!=""){
//                    echo "id_preg: ".$texto."|| tipo_pregunta: ".$tipo."|| id_formulario: ".$id_formulario."</br>";  
                    $query="INSERT INTO pregunta(numero_pregunta,texto,tipo,formulario_idformulario)".
                    " VALUES('".$numero_pregunta."','".$texto."','".$tipo."','".$id_formulario."');";
                    $resultado_=mysqli_query($conexion,$query) 
                        or die ("Error: ".mysqli_error($conexion));
                    $id_pregunta=mysqli_insert_id($conexion);
                    $texto=$numero_pregunta="";
                }
                
                if(strrpos($param_name,"opc_")>-1){                    
                    $texto_opcion=mysqli_real_escape_string($conexion,$param_val);                    
                    $numero_opc=explode("_",$param_name)[4]+1;                    
//                    echo "entro opc_".$numero_opc."</br>";                                      
                }
                
                if($texto_opcion!=""){
//                    echo "entro insertar opc</br>";                                      
                    $esObligatoria=0;    
                    $query="INSERT INTO respuesta(numero_opcion,tipo,texto,obligatoria)".
                        " VALUES('".$numero_opc."','".$tipo."','".$texto_opcion."','".$esObligatoria."');";
                    $resultado_=mysqli_query($conexion,$query) 
                        or die ("Error: ".mysqli_error($conexion));
                    
                    //Para incersion en tabla bridge pregunta-respuesta
                    $id_respuesta=mysqli_insert_id($conexion);
                    
                    $query="INSERT INTO respuesta_pregunta(pregunta_idpregunta,respuesta_idrespuesta)".
                        " VALUES('".$id_pregunta."','".$id_respuesta."');";
                    $resultado_=mysqli_query($conexion,$query) 
                        or die ("Error: ".mysqli_error($conexion));
                    
                    
                    $texto_opcion=$numero_opc="";
                }
            }
            header("Location: ../Menus/Menu_Admin.php");        
        }else{
            print_r(error_get_last());
        }        
    }else{
        echo "Agregue al menos una pregunta.";
    }
}else{
    header("Location: ../Login.php");
}


?>