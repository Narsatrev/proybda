<?php 
session_start();
if($_SESSION['username']==""){
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<title>Bienvenido</title>
		<link rel="stylesheet" type="text/css" href="css/home.css" />
        <link rel="stylesheet" type="text/css" href="css/style_alerta_global.css"/>
        
         <script src="frameworks/jquery-2.1.4.js"></script>
        <script src="js/f_alerta.js"></script>
	</head>
	<body>
        <div id="barra_doc_up">Sistema Criminal y Judicial
            <a href="Nosotros.php"><div id="botonNosotros">
                <strong>Nosotros</strong>
            </div></a>
            <?php
            if($_SESSION['esAdmin']==1){
                echo "<a href='AgregarUsuario.php'><div id='botonNuevoUsuario'>+ Usuario</div></a>";
            }
            ?>
            <a href="Controlador/Logout.php"><div id="botonLogout">
                <strong>Logout</strong>
            </div></a>
        </div>
        <div id="barra_doc_down">©2016-2023 Soluciones Digitales y de Inteligencia de Negocios S.A. de C.V. Todos los derechos reservados.</div>
        <div>
            <ul class="cbp-ig-grid menu1">
					<li>
						<a href="#" id="boton_agresor">
							<span class="icon agresor"></span>
							<h3 class="cbp-ig-title">Agresores</h3>
						</a>
					</li>
					<li>
						<a href="#" id="boton_oficial">
							<span class="icon oficial"></span>
							<h3 class="cbp-ig-title">Oficiales</h3>
						</a>
                    </li>
                    <li>
						<a href="#" id="boton_delito">
							<span class="icon delito"></span>
							<h3 class="cbp-ig-title">Delito</h3>
						</a>
                    </li>
				</ul>
        </div>
        <div>
            <ul class="cbp-ig-grid menu" id="menu_agresor" style="visibility:hidden;" >
					<li>
						<a href="NuevoAgresor.html">
							<span class="icon agregar"></span>
							<h3 class="cbp-ig-title">Agregar</h3>
						</a>
					</li>
					<li>
						<a href="BuscarAgresor.php">
							<span class="icon buscar"></span>
							<h3 class="cbp-ig-title">Buscar</h3>
						</a>
                    </li>
				</ul>
        </div>
        <div>
            <ul class="cbp-ig-grid menu" id="menu_oficial" style="visibility:hidden;" >
					<li>
						<a href="NuevoOficial.html">
							<span class="icon agregar"></span>
							<h3 class="cbp-ig-title">Agregar</h3>
						</a>
					</li>
					<li>
						<a href="BuscarOficial.php">
							<span class="icon buscar"></span>
							<h3 class="cbp-ig-title">Buscar</h3>
						</a>
                    </li>
				</ul>
        </div>
        <div>
            <ul class="cbp-ig-grid menu" id="menu_delito" style="visibility:hidden;" >
					<li>
						<a href="NuevoDelito.html">
							<span class="icon agregar"></span>
							<h3 class="cbp-ig-title">Agregar</h3>
						</a>
					</li>
					<li>
						<a href="BuscarDelito.php">
							<span class="icon buscar"></span>
							<h3 class="cbp-ig-title">Buscar</h3>
						</a>
                    </li>
				</ul>
        </div>
	</body>
</html>

<script>
    if($(location).attr('href').indexOf('?')>=0){
        var uri=$(location).attr('href').substr(-3, 3);
        if(uri.indexOf('exi')>=0){
            alerta_global(0,'Éxito','Agresor agregado');
        }
        if(uri.indexOf('frc')>=0){
            alerta_global(0,'Error','Ocurrió un error en la base de datos...');
        }        
        if(uri.indexOf('exo')>=0){
            alerta_global(0,'Éxito','Oficial agregado');
        }
        if(uri.indexOf('fro')>=0){
            alerta_global(0,'Error','Ocurrió un error en la base de datos...');
        }
        if(uri.indexOf('exc')>=0){
            alerta_global(0,'Éxito','Nuevo delito agregado');
        }
        if(uri.indexOf('frc')>=0){
            alerta_global(0,'Error','Ocurrió un error en la base de datos...');
        }
        if(uri.indexOf('eua')>=0){
            alerta_global(0,'Éxito','Agresor actualizado');
        }
        if(uri.indexOf('fua')>=0){
            alerta_global(0,'Error','Ocurrió un error en la base de datos...');
        }
        if(uri.indexOf('euo')>=0){
            alerta_global(0,'Éxito','Oficial actualizado');
        }
        if(uri.indexOf('eud')>=0){
            alerta_global(0,'Éxito','Delito actualizado');
        }
        if(uri.indexOf('ure')>=0){
            alerta_global(0,'Éxito','Usuario agregado');
        }        
        
    }    
    
    $("#boton_agresor").hover(function mostrarAgresor(){
        $("#menu_agresor").css("visibility","visible");
    },function mostrarAgresor(){
        if(!$("#menu_agresor").is(":hover")){
            $("#menu_agresor").css("visibility","hidden");
        }
    });
    $("#menu_agresor").hover(null,function mostrarAgresor(){
        if(!$("#boton_agresor").is(":hover")){
            $("#menu_agresor").css("visibility","hidden");
        }
    });
    $("#boton_oficial").hover(function mostrarAgresor(){
        $("#menu_oficial").css("visibility","visible");
    },function mostrarAgresor(){
        if(!$("#menu_oficial").is(":hover")){
            $("#menu_oficial").css("visibility","hidden");
        }
    });
    $("#menu_oficial").hover(null,function mostrarAgresor(){
        if(!$("#boton_oficial").is(":hover")){
            $("#menu_oficial").css("visibility","hidden");
        }
    });
    
     $("#boton_delito").hover(function mostrarAgresor(){
        $("#menu_delito").css("visibility","visible");
    },function mostrarAgresor(){
        if(!$("#menu_delito").is(":hover")){
            $("#menu_delito").css("visibility","hidden");
        }
    });
    $("#menu_delito").hover(null,function mostrarAgresor(){
        if(!$("#boton_delito").is(":hover")){
            $("#menu_delito").css("visibility","hidden");
        }
    });
</script>
