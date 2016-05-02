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
        <form class="datos" id="formaBusqueda" method="post" action="Controlador/BusquedaDelito.php">
            <h1>Buscar Delito</h1>
             <div class="row">
                <div class="col-md-6"><input type=search id="datos_busqueda" class="form-control"></div>
                 <div class="col-md-2"><button class="buscar icon" id="buscar_b"></button></div> 
            </div>
            <div class="row">
            <div class="col-md-10">
                <table class="table" id="tablaDelitos">
                    <thead id="cabeza">
                      <tr>
                        <th>Nombre</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
include('Controlador/connectar.php');    
$query= "SELECT id_crimen,nombre_crimen FROM catalogo_crimen;";
$select= mssql_query($query);

if (!mssql_num_rows($select)) {
    echo 'No hay delitos que mostrar';
} else {
    while ($row = mssql_fetch_assoc ($select)) {
        echo "<tr>";
        echo "<td>".$row['nombre_crimen']."</td>";
        echo "<td><div class= 'btn-group'>".
            "<button type='button' class='botonDetalleDelito btn btn-primary oficial_".$row['id_crimen']."' ".
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
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background:#000080;color:white;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Información delito</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                <div class="col-md-3"><label>Tipo de delito</label></div>
                <div class="col-md-6"><label id="tipo">*********</label></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Nombre del delito</label></div>
                <div class="col-md-6"><label id="nom">*********</label></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Descripción</label></div>
                <div class="col-md-7"><label id="desc">*********</label></div>
                <input type="hidden" name="id" id="id"/>
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
                    <h3 class="modal-title">Editar delito</h3>
                  </div>
                  <div class="modal-body">
                    <form id="formaUpdateDelito" action="Controlador/UpdateDelito.php" method="post">                          
                        
                    <input type="hidden" name="secreto_delito" id="secreto_delito"/>
                    <div class="row">
                <div class="col-md-3"><label>Tipo de delito:</label></div>
                <div class="col-md-6"><select id="tipo_delito" name="tipo_delito" class="form-control">
                    <option value="Delitos contra la vida humana independiente">Delitos contra la vida humana independiente</option>
                    <option value="Delitos contra la salud y la integridad corporal">Delitos contra la salud y la integridad corporal</option>
                    <option value="Delitos contra la libertad">Delitos contra la libertad</option>
                    
                    <option value="Torturas y otros delitos contra la integridad moral">Torturas y otros delitos contra la integridad moral</option>
                    <option value="Delitos contra la intimidad, el derecho a la propia imagen y la inviolabilidad de domicilio">Delitos contra la intimidad, el derecho a la propia imagen y la inviolabilidad de domicilio</option>
                    <option value="Delitos contra el patrimonio y el orden socioeconómico">Delitos contra el patrimonio y el orden socioeconómico</option>
                    <option value=" Delitos contra la salud pública: delitos relativos al tráfico de drogas"> Delitos contra la salud pública: delitos relativos al tráfico de drogas</option>
                    <option value="Delitos contra la seguridad vial">Delitos contra la seguridad vial</option>
                    <option value="Delitos contra las relaciones familiares">Delitos contra las relaciones familiares</option>
                    <option value="Delitos de falsedad">Delitos de falsedad</option>
                    <option value="Delitos contra el honor">Delitos contra el honor</option>
                    <option value="Delitos contra la Administración Pública">Delitos contra la Administración Pública</option>
                    <option value="Delitos contra la Administración de Justicia">Delitos contra la Administración de Justicia</option>
                    <option value="Delitos contra la ordenación del territorio">Delitos contra la ordenación del territorio</option>
                    <option value="Delitos contra el patrimonio histórico">Delitos contra el patrimonio histórico</option>
                    <option value="Delitos contra los recursos naturales">Delitos contra los recursos naturales</option>
                    <option value="Delitos relativos a la protección de la flora y la fauna">Delitos relativos a la protección de la flora y la fauna</option>
                    <option value="Delitos relativos a la caza y la pesca">Delitos relativos a la caza y la pesca</option>
                    </select>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Nombre del delito</label></div>
                <div class="col-md-6"><input type="text" id="nombre_delito" name="nombre_delito" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Descripción del crimen</label></div>
                <div class="col-md-6"><textarea  id="descripcion" name="descripcion" class="form-control"></textarea></div>
            </div>
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
                if(uri.indexOf('eud')>=0){
                    alerta_global(0,'Éxito','Delito actualizado');
                }
            }
            
            $(document).on('click',".botonDetalleDelito",function(){
                var id=$(this).attr('class').split(" ")[3].split("_")[1];
                $.ajax({
                    type:"POST",
                    url:"Controlador/DetallesDelito.php",
                    data:{'id':id},
                    cache:false,
                    success:function(data){ 
                        var arr_res=data.split("###");
                        $("#id").val(arr_res[0]);
                        $("#tipo").html(arr_res[1]);
                        $("#nom").html(arr_res[2]);
                        $("#desc").html(arr_res[3]);
                    }
                });
            });
            
            $(".botonEditar").on("click",function(){                
                $("#secreto_delito").val($("#id").val());                
                var $forma = $("#formaUpdateDelito");
                $forma.find("select[name='tipo_delito']").val($("#tipo").html()),
                $forma.find("input[name='nombre_delito']").val($("#nom").html()),
                $forma.find("textarea[name='descripcion']" ).val($("#desc").html());
            });
            
            $("#botonGuardar").on("click",function(){
                var $forma = $("#formaUpdateDelito"),
                tipo=$forma.find("#select[name='tipo_delito']").val(),
                nombre=$forma.find("input[name='nombre_delito']").val(),
                desc=$forma.find("textarea[name='descripcion']" ).val();
                
               if(tipo==""||nombre==""||desc==""){
                        alerta_global(0,'Campos vacíos','Llene todos los campos!');
                }else{
                    $("#formaUpdateDelito").submit();
                }
            });
            
            $("#buscar_b").on("click",function(e){
                e.preventDefault();
            });
            
            $("#buscar_b").on("click",function(e){
                e.preventDefault();
                var datos_busqueda=$("#datos_busqueda").val();
                $.ajax({
                    type:"POST",
                    url:"Controlador/BusquedaDelito.php",
                    data:{'datos_busqueda':datos_busqueda},
                    cache:false,
                    success:function(data){ 
                        var resultados=data.split("***");
                        var tabla="";                        
                        
                        $('#tablaDelitos').find('tbody').remove();
                        tabla+="<tbody>";
                        for(var i=0;i<resultados.length-1;i++){
                            var r2=resultados[i].split("###");
                            tabla+="<tr>"+
                                "<td>"+r2[1]+"</td>"+
                                "<td><div class= 'btn-group'>"+
                                "<button type='button' class='botonDetalleDelito btn btn-primary agresor_"+r2[0]+
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
