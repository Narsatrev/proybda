<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<title>Bienvenido</title>
		<link rel="stylesheet" type="text/css" href="css/home.css" />
        <link rel="stylesheet" type="text/css" href="css/style_alerta_global.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>    
        
         <script src="frameworks/jquery-2.1.4.js"></script>
        <script src="js/f_alerta.js"></script>
	</head>
	<body>
        <div id="barra_doc_up">Sistema Criminal y Judicial</div>
        <div id="barra_doc_down">©2016-2023 Soluciones Digitales y de Inteligencia de Negocios S.A. de C.V. Todos los derechos reservados.</div>
        <form id="formaLogin" method="post" action="Controlador/ManejarLogin.php">
            Usuario<br> <input type="text" id="usuario" name="usuario"/><br><br>
            Password<br> <input type="password" id="password" name="password"/><br>
            <input type="submit" id="boton_submit" value="Ingresar"/>
        </form>
        <script>
            
        if($(location).attr('href').indexOf('?')>=0){
            var uri=$(location).attr('href').substr(-1, 1);
            if(uri.indexOf('1')>=0){
                alerta_global(0,'Error','Complete los campos vacíos');
            }
            if(uri.indexOf('2')>=0){
                alerta_global(0,'Error','Sus datos son incorrectos');
            }
        }
            
        </script>
    </body>
</html>