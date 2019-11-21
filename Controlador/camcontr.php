<?php 
 include_once '../Modelo/Consultas.php';
 $cons = new Consultas();
 $url = $_GET['p'];
 $id_usu =$cons->url_secreta_existe($url);
if(isset($_POST['btnen'])){
 	$con1 = $_POST['con1'];
 	$con2 = $_POST['con2'];
 	if($con1 === $con2){
 		if ($cons->ActualizarContra(password_hash($con1, PASSWORD_BCRYPT), $id_usu)){
            $borrado = $cons->Borrar_Cambio($id_usu);
            ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <title>Services Rest Api Recuperar Contraseña</title>
</head>
<body style="background-image: url(../assets/images/fondo.gif); background-position: top; background-attachment: fixed; background-size: cover; background-repeat: no-repeat;">
    <div class="container mt-8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <aside class="col">
                    	<div class="card">
                      		<article class="card-body">
                        		<h4 class="card-title mb-4 mt-1">
                                <?php 
                                if($borrado)
                                    echo "Se a Realizado el cambio de su contraseña re direccionando a la pagina principal";
                                ?></h4>
                        		<meta http-equiv='Refresh' content='3.0; URL=../index.php'>
                   		 	</article>
                    	</div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
<?php
 		}
 	}
 }else if($id_usu !== NULL){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <title>Services Rest Api Recuperar Contraseña</title>
</head>
<body style="background-image: url(../assets/images/fondo.gif); background-position: top; background-attachment: fixed; background-size: cover; background-repeat: no-repeat;">
    <div class="container mt-8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <aside class="col">
                    	<div class="card">
                      		<article class="card-body">
                        		<h4 class="card-title mb-4 mt-1">Cambio de Contraseña</h4>
                        		<form action="camcontr.php?p=<?php echo $url;?>" method="POST" id="frm">
                            		<div class="form-group">
                                		<label>Nueva Contraseña</label>
                                		<input name="con1" class="form-control" placeholder="******" type="text" id="con1" autocomplete="off">
                            		</div>
                            		<div class="form-group">
                                		<label>Repetir Contraseña</label>
                                		<input class="form-control" placeholder="******" type="password" name="con2" id="con2" autocomplete="off">
                            		</div>
                            		<div class="form-group">
                                        <input type="hidden" name="btnen">
                            			<div id="mens"></div>
                            		</div>
                            		<div class="form-group">
                                		<button type="button" class="btn btn-primary btn-block" onclick="comprobar()">Enviar</button>
                            		</div>            
                        		</form>
                   		 	</article>
                    	</div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    	function comprobar(){
    		var con1 = document.getElementById("con1").value;
			var con2 = document.getElementById("con2").value;
			if((con1 !== con2) || (con1 == "" || con2 == "")){
				document.getElementById("mens").innerHTML="<div class='alert alert-warning' role='alert'><i class='fas fa-exclamation-triangle'></i> Las contraseñas no coinciden</div>";
			}else
				document.getElementById("frm").submit();
    	}
    	
    </script>
</body>
</html>
<?php
	}else{
 	http_response_code(404);
 }
?>