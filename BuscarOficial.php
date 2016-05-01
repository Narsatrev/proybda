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
            <h1>Buscar Oficial</h1>
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
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Juan</td>
                        <td>Pérez</td>
                        <td>Torrez</td>
                          <td><div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Consultar</button>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Mondragón</td>
                        <td>Montes</td>
                          <td><div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Consultar</button>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>Julio</td>
                        <td>Sánchez</td>
                        <td>López</td>
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
                <div class="col-md-6"><label id="id">*********</label></div>
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
                    <h3 class="modal-title">Editar Oficial</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                <div class="col-md-3"><label>Número de identificación</label></div>
                <div class="col-md-6"><input type="text" id="identificacion" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Nombre</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="nombre"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label>Apellido Paterno</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="apellido_p"></div>
            </div>
             <div class="row">
                <div class="col-md-3"><label>Apellido Materno</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="apellido_m"></div>
            </div>
            <div class="row">
                    <div class="col-md-3"><label>Perfíl</label></div>
                    <div class="col-md-7"><select id="perfil">
                        <option value="fiscal">Fiscal</option>
                        <option value="oficial">Oficial</option>
                        <option value="perito">Perito</option>
                        <option value="abogado">Abogado</option>
                        <option value="administrativo">Administrativo</option>
                        <option value="administrativo auxiliar">Administrativo Auxiliar</option>
                        <option value="juez">Juez</option>
                        </select></div>
                </div>
            <div class="row">
                <div class="col-md-3"><label>Rol</label></div>
                <div class="col-md-7"><input type="text" class="form-control" id="dirección"></div>
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
