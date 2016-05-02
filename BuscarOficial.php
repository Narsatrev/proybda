<?php 
session_start();
if($_SESSION['username']==""){
    header("Location: Login.php");
}
?>
<html lang="en" class="no-js">
	<head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="frameworks/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="frameworks/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/cuestionario.css" />
        <link rel="stylesheet" type="text/css" href="css/style_alerta_global.css"/>    
         <script src="frameworks/js-modal/jquery.min.js"></script>
        <script src="frameworks/js-modal/bootstrap.min.js"></script>
        <script src="js/f_alerta.js"></script>        
    </head>
	<body>
        <form class="datos" id="formaBusqueda" method="post" action="Controlador/BusquedaOficial.php">
            <h1>Buscar Oficial</h1>
             <div class="row">
                <div class="col-md-6"><input type=search id="datos_busqueda" class="form-control"></div>
                 <div class="col-md-2"><button class="buscar icon" id="buscar_b"></button></div> 
            </div>
        
            <div class="row">
            <div class="col-md-10">
                <table class="table" id="tablaOficiales">
                    <thead id="cabeza">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Perfil</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
include('Controlador/connectar.php');    
$query= "SELECT id_oficial,nombres,apellido_paterno,apellido_materno, perfil FROM oficial;";
$select= mssql_query($query);

if (!mssql_num_rows($select)) {
    echo 'No hay oficiales que mostrar';
} else {
    while ($row = mssql_fetch_assoc ($select)) {
        echo "<tr>";
        echo "<td>".$row['nombres']."</td>";
        echo "<td>".$row['apellido_paterno']."</td>";
        echo "<td>".$row['apellido_materno']."</td>";
        echo "<td>".$row['perfil']."</td>";
        echo "<td><div class= 'btn-group'>".
            "<button type='button' class='botonDetalleOficial btn btn-primary oficial_".$row['id_oficial']."' ".
            "data-toggle='modal' data-target='#modal'>Consultar</button>".
            "</div>".
            "</td>";
        echo "</tr>";
    }
}
?>
                    </tbody>
                  </table>
                </div>
                </div>
            </form>
         <div class="row">
                <div class="col-md-4"><button class="regresar" onclick="window.location.href='index.php'"><label class="icon prev"></label></button></div>
            </div>
        <div id="modal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background:#000080;color:white;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Información oficial</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                <div class="col-md-3"><label>Número de identificación</label></div>
                <div class="col-md-6"><label id="num_seg">*********</label></div>
<!--                          Campo oculto para id-->
                          <input type="hidden" id="id"/>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Nombre</label></div>
                <div class="col-md-7"><label id="nom">*********</label></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Apellido Paterno</label></div>
                <div class="col-md-3"><label id="ap">*********</label></div>
                <div class="col-md-3"><label>Apellido Materno</label></div>
                <div class="col-md-3"><label id="am">*********</label></div>
            </div>  
            <div class="row">
                    <div class="col-md-3"><label>Perfíl</label></div>
                <div class="col-md-3"><label id="perf">*********</label></div>
                <div class="col-md-3"><label>Rol</label></div>
                <div class="col-md-3"><label id="rol_inf">*********</label></div>
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="botonEditar btn btn-default" data-toggle="modal" data-target="#modal_editar">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
        <div id="modal_editar" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background:#000080;color:white;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Editar Oficial</h3>
                  </div>
                    
                  <div class="modal-body">
                      <form id='formaUpdateOficial' action="Controlador/UpdateOficial.php" method="post">
                      <div class="row">
                <div class="col-md-3"><label>Número de identificación</label></div>
                <div class="col-md-6"><input type="text" id="identificacion" name="identificacion" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Nombre</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="nombre" name="nombre"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Apellido Paterno</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="apellido_p" name="apellido_p"></div>
            </div>
             <div class="row">
                <div class="col-md-3"><label>Apellido Materno</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="apellido_m" name="apellido_m"></div>
            </div>
            <div class="row">
                    <div class="col-md-3"><label>Perfíl</label></div>
                    <div class="col-md-7"><select id="perfil" name="perfil">
                        <option value="Fiscal">Fiscal</option>
                        <option value="Oficial">Oficial</option>
                        <option value="Abogado">Abogado</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Administrativo Auxiliar">Administrativo Auxiliar</option>
                        </select></div>
                </div>
            <div class="row">
                <div class="col-md-3"><label>Rol</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="rol" name="rol"></div>
            </div>
                          <input type="hidden" name="secreto_oficial" id="secreto_oficial"/>
                          </form>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="botonGuardar">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
        
            <script>                    
            if($(location).attr('href').indexOf('?')>=0){
                var uri=$(location).attr('href').substr(-3, 3);
                if(uri.indexOf('euo')>=0){
                    alerta_global(0,'Éxito','Oficial actualizado');
                }
            }    
                
            $(document).on('click',".botonDetalleOficial",function(){
                var id=$(this).attr('class').split(" ")[3].split("_")[1];
                $.ajax({
                    type:"POST",
                    url:"Controlador/DetallesOficial.php",
                    data:{'id':id},
                    cache:false,
                    success:function(data){ 
                        var arr_res=data.split("###");
                        $("#id").val(arr_res[0]);
                        $("#num_seg").html(arr_res[1]);
                        $("#nom").html(arr_res[2]);
                        $("#ap").html(arr_res[3]);
                        $("#am").html(arr_res[4]);
                        $("#perf").html(arr_res[5]);
                        $("#rol_inf").html(arr_res[6]);                        
                    }
                });
            });
            
            $(".botonEditar").on("click",function(){                
                $("#secreto_oficial").val($("#id").val());                
                var $forma = $("#formaUpdateOficial");
                $forma.find("#identificacion").val($("#num_seg").html()),
                $forma.find("input[name='nombre']" ).val($("#nom").html()),
                $forma.find("input[name='apellido_p']" ).val($("#ap").html()),
                $forma.find("input[name='apellido_m']").val($("#am").html()),
                $forma.find("select[name='perfil']").val($("#perf").html()),
                $forma.find("input[name='rol']").val($("#rol_inf").html()),
                $forma.find("input[name='secreto_oficial']").val($("#id").val());                        
            });
            
            
            $("#botonGuardar").on("click",function(){
                var $forma = $("#formaUpdateOficial"),
                num_seg=$forma.find("#seguridad_social" ).val(),
                nombre = $forma.find("input[name='nombre']" ).val(),
                apellido_p = $forma.find("input[name='apellido_p']" ).val(),
                apellido_m=$forma.find("input[name='apellido_m']").val(),
                perfil=$forma.find("input[name='perfil']").val(),
                rol=$forma.find("input[name='rol']").val();
                
               if(num_seg==""||nombre==""||apellido_p==""||apellido_m==""||perfil==""
                  ||rol==""){
                        alerta_global(0,'Campos vacíos','Llene todos los campos!');
                }else{
                    $("#formaUpdateOficial").submit();
                }
            });
                
            $("#buscar_b").on("click",function(e){
                e.preventDefault();
                var datos_busqueda=$("#datos_busqueda").val();
                $.ajax({
                    type:"POST",
                    url:"Controlador/BusquedaOficial.php",
                    data:{'datos_busqueda':datos_busqueda},
                    cache:false,
                    success:function(data){ 
                        var resultados=data.split("***");
                        var tabla="";                        
                        
                        $('#tablaOficiales').find('tbody').remove();
                        tabla+="<tbody>";
                        for(var i=0;i<resultados.length-1;i++){
                            var res_individual=resultados[i].split("###");
                            tabla+="<tr>"+
                                "<td>"+res_individual[1]+"</td>"+
                                "<td>"+res_individual[2]+"</td>"+
                                "<td>"+res_individual[3]+"</td>"+
                                "<td><div class= 'btn-group'>"+
                                "<button type='button' class='botonDetalleOficial btn btn-primary agresor_"+res_individual[0]+
                                "' data-toggle='modal' data-target='#modal'>Consultar</button>"+
                                "</div>"+
                                "</td>"+
                                "</tr>";                            
                        }
                        tabla+="</tbody>";
                        $("#cabeza").after(tabla);
                    }
                });
            });
                        
        </script>
	</body>
</html>
