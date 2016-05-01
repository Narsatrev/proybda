<html lang="en" class="no-js">
	<head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="frameworks/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="frameworks/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/cuestionario.css" />
         <script src="frameworks/js-modal/jquery.min.js"></script>
        <script src="frameworks/js-modal/bootstrap.min.js"></script>
    </head>
	<body>
        <form class="datos">
            <h1>Buscar Delito</h1>
             <div class="row">
                <div class="col-md-6"><input type=search id="identificacion" class="form-control"></div>
                 <div class="col-md-2"><button class="buscar icon" id="buscar_b"></button></div> 
            </div>
            <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Homicidio en tercer grado</td>
                          <td><div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Consultar</button>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>Tráfico de drogas</td>
                          <td><div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Consultar</button>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>Delito de infamia</td>
                          <td><div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Consultar</button>
                            </div>
                          </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </div>
            </form>
         <div class="row">
                <div class="col-md-4"><button class="regresar" onclick="window.location.href='index.html'"><label class="icon prev"></label></button></div>
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
                <div class="col-md-7"><label id="ap">*********</label></div>
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_editar">Editar</button>
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
                    <div class="row">
                <div class="col-md-3"><label>Tipo de delito:</label></div>
                <div class="col-md-6"><select id="tipo de delito" class="form-control">
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
                <div class="col-md-6"><input type="text" id="identificacion" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Descripción del crimen</label></div>
                <div class="col-md-6"><textarea  id="descripcion" class="form-control"></textarea></div>
            </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
	</body>
</html>
