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
        <form class="datos" id="formaBusqueda" method="post" action="Controlador/BusquedaAgresor.php">
            <h1>Buscar Agresor</h1>
             <div class="row">
                <div class="col-md-6"><input type=search id="datos_busqueda" class="form-control"></div>
                 <div class="col-md-2"><button class="buscar icon" id="buscar_b"></button></div> 
            </div>
            <div class="row">
            <div class="col-md-10">
                <table class="table" id="tablaAgresores">
                    <thead id="cabeza">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
include('Controlador/connectar.php');    
$query= "SELECT id_infractor,nombres,apellido_paterno,apellido_materno FROM infractor;";
$select= mssql_query($query);

if (!mssql_num_rows($select)) {
    echo 'No hay infractores que mostrar';
} else {
    while ($row = mssql_fetch_assoc($select)) {
        echo "<tr>";
        echo "<td>".$row['nombres']."</td>";
        echo "<td>".$row['apellido_paterno']."</td>";
        echo "<td>".$row['apellido_materno']."</td>";
        echo "<td><div class= 'btn-group'>".
            "<button type='button' class='detallesAgresor btn btn-primary agresor_".$row['id_infractor'].
            "' data-toggle='modal' data-target='#modal'>Consultar</button>".
            "<button type='button' class='btn btn-info'>Nueva nota</button>".
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
                    <h3 class="modal-title">INFORMACIÓN AGRESOR</h3>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"><label>Número de seguridad social:</label></div>
                        <div class="col-md-6"><label id="num_seg">*********</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Nombre:</label></div>
                        <div class="col-md-7"><label id="nom">*********</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Apellido Paterno:</label></div>
                        <div class="col-md-3"><label id="ap">*********</label></div>
                        <div class="col-md-3"><label>Apellido Materno:</label></div>
                        <div class="col-md-3"><label id="am">*********</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Fecha de nacimiento:</label></div>
                        <div class="col-md-3"><label id="fecha">*********</label></div>
                        <div class="col-md-3"><label>Sexo:</label></div>
                        <div class="col-md-3"><label id="gen">M/F</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Dirección:</label></div>
                        <div class="col-md-3"><label id="dir">*********</label></div>
                        <div class="col-md-3"><label>Educación (años):</label></div>
                        <div class="col-md-3"><label id="edu">*********</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Etnia:</label></div>
                        <div class="col-md-3"><label id="et">*********</label></div>
                            <div class="col-md-3"><label>Religión:</label></div>
                             <div class="col-md-3"><label id="rel">*********</label></div>
                        </div>
                      <hr>
<!--                      CAMPO OCULTO PARA EL ID-->
                      <input type="hidden" id="secret_agresor"/>
                      
                      <h4>Notas</h4>
                      <ul>
                          <li><a>Crimen de exceso de velocidad</a></li>
                          <li><a>Evasión de impuestos</a></li>
                          <li><a>Narcotráfico</a></li>
                      </ul>
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
                    <h3 class="modal-title">Editar Agresor</h3>
                  </div>
                  <div class="modal-body">
                    <form action="Controlador/UpdateAgresor.php" method="post" id="formaUpdateAgresor">
                    <div class="row">
                        <div class="col-md-3"><label>Número de seguridad social</label></div>
                        <div class="col-md-6"><input type="text" id="seguridad_social" name="seguridad_social" class="form-control"></div>
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
                        <div class="col-md-3"><label>Fecha de nacimiento</label></div>
                        <div class="col-md-4"><input type="date" class="form-control" id="fecha_nac" name="fecha_nac"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Sexo</label></div>
                        <div class="col-md-7"><div class="col-md-3">
                            <input type="radio" name="genero" value="Hombre" checked>&nbsp;&nbsp;&nbsp;Hombre</div>
                            <input type="radio" name="genero" value="Mujer">&nbsp;&nbsp;&nbsp;Mujer</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Dirección</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" id="direccion" name="direccion"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Educación (años)</label></div>
                        <div class="col-md-3"><input type="number" class="form-control" id="educacion" name="educacion"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><label>Etnia</label></div>
                        <div class="col-md-3"><input type="text" class="form-control" id="etnia" name="etnia"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-3"><label>Religión</label></div>
                             <div class="col-md-3"><input type="text" class="form-control" id="religion" name="religion"></div>
                        </div>
                        
                        <input type="hidden" id="secretFormaAgresor" name="id"/>
                        </form>  
                  </div>
                      
                  <div class="modal-footer">
                    <button type="button" id="botonGuardar" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
        <script>
            if($(location).attr('href').indexOf('?')>=0){
                var uri=$(location).attr('href').substr(-3, 3);
                if(uri.indexOf('eua')>=0){
                    alerta_global(0,'Éxito','Agresor actualizado');
                }
            }    
            
             
            
            $(document).on('click',".detallesAgresor",function(){
                var id=$(this).attr('class').split(" ")[3].split("_")[1];

                $.ajax({
                    type:"POST",
                    url:"Controlador/DetallesAgresor.php",
                    data:{'id':id},
                    cache:false,
                    success:function(data){ 
                        var arr_res=data.split("###");
                        $("#secret_agresor").val(arr_res[0]);
                        $("#num_seg").html(arr_res[1]);
                        $("#nom").html(arr_res[2]);
                        $("#ap").html(arr_res[3]);
                        $("#am").html(arr_res[4]);
                        $("#fecha").html(arr_res[5]);
                        $("#gen").html(arr_res[6]);
                        $("#dir").html(arr_res[7]);
                        $("#edu").html(arr_res[8]);
                        $("#et").html(arr_res[9]);
                        $("#rel").html(arr_res[10]);                                            
                    }
                });
            });
            
            $(".botonEditar").on("click",function(){                
                $("#secretFormaAgresor").val($("#secret_agresor").val());                
                var $forma = $("#formaUpdateAgresor");
                $forma.find("#seguridad_social" ).val($("#num_seg").html()),
                $forma.find("input[name='nombre']" ).val($("#nom").html()),
                $forma.find("input[name='apellido_p']" ).val($("#ap").html()),
                $forma.find("input[name='apellido_m']").val($("#am").html()),
                $forma.find("input[name='fecha_nac']").val($("#fecha").html()),
                $forma.find("input[name='genero']").val($("#gen").html()),
                $forma.find("input[name='direccion']").val($("#dir").html()),
                $forma.find("input[name='educacion']").val($("#edu").html()),
                $forma.find("input[name='etnia']").val($("#et").html()),
                $forma.find("input[name='religion']").val($("#rel").html());
            });
            
            
            $("#botonGuardar").on("click",function(){
                var $forma = $("#formaUpdateAgresor"),
                seguridad_social=$forma.find("#seguridad_social" ).val(),
                nombre = $forma.find("input[name='nombre']" ).val(),
                apellido_p = $forma.find("input[name='apellido_p']" ).val(),
                apellido_m=$forma.find("input[name='apellido_m']").val(),
                fecha_nac=$forma.find("input[name='fecha_nac']").val(),
                genero=$forma.find("input[name='genero']").val(),
                direccion=$forma.find("input[name='direccion']").val(),
                educacion=$forma.find("input[name='educacion']").val(),
                etnia=$forma.find("input[name='etnia']").val(),
                religion=$forma.find("input[name='religion']").val();
                
               if(seguridad_social==""||nombre==""||apellido_p==""||apellido_m==""||fecha_nac==""
                  ||genero==""||direccion==""||etnia==""||religion==""||educacion==""){
                        alerta_global(0,'Campos vacíos','Llene todos los campos!');
                }else{
                    $("#formaUpdateAgresor").submit();
                }
            });
            
            $("#buscar_b").on("click",function(e){
                e.preventDefault();
                var datos_busqueda=$("#datos_busqueda").val();
                $.ajax({
                    type:"POST",
                    url:"Controlador/BusquedaAgresor.php",
                    data:{'datos_busqueda':datos_busqueda},
                    cache:false,
                    success:function(data){ 
                        var resultados=data.split("***");
                        var tabla="";                        
                        
                        $('#tablaAgresores').find('tbody').remove();
                        tabla+="<tbody>";
                        for(var i=0;i<resultados.length-1;i++){
                            var res_individual=resultados[i].split("###");
                            tabla+="<tr>"+
                                "<td>"+res_individual[1]+"</td>"+
                                "<td>"+res_individual[2]+"</td>"+
                                "<td>"+res_individual[3]+"</td>"+
                                "<td><div class= 'btn-group'>"+
                                "<button type='button' class='detallesAgresor btn btn-primary agresor_"+res_individual[0]+
                                "' data-toggle='modal' data-target='#modal'>Consultar</button>"+
                                "<button type='button' class='btn btn-info'>Nueva nota</button>"+
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
