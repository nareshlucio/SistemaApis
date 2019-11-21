<?php 
    require '../Modelo/BD.php';
    require '../Modelo/Consultas.php';
    require '../Modelo/recuperacion_clave.php';
    
    $consultas = new Consultas();
    if (isset($_POST['correo'])) {
        $correo = $_POST['correo'];
        $url = $consultas->ExistCorreo_recuperar($correo);
        $urlencr=hash('sha256', $url);
        $recu = new Recuperacion($consultas->id_usuario, $urlencr, date("Y-m-d H:i:s"));
        $peticion = $recu->generar_peticion($recu->conexionPDO(), $recu->id_usuario ,$recu->url_secreta);
        if($peticion){
            $mensaje = "Ustes a solicitado un cambio de contraseña a continuacion de click en el enlace para poder proceder al cambio de contraseña. si usted no solicito este cambio solo ignore el correo.            /n https://apisnaresh.webcindario.com/Controlador/camcontr.php?p=".$urlencr;
            echo "<meta http-equiv='Refresh' content='4.0; URL=../index.php'>";
            mail($correo, "Olvide Mi Contraseña",$mensaje);
        }
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
                        <?php 
                        if($peticion){
                            echo "<h4 class='card-title mb-4 mt-1'>Se ha enviado un email con la informacion necesaria para poder recuperar su contraseña</h4>"; 
                        }else{
                            echo "<h4 class='card-title mb-4 mt-1'>Hubo un error al momento de mandar la informacion a su correo electronico intentelo mas tarde</h4>";
                             echo "<meta http-equiv='Refresh' content='0.8; URL=Vista/index.php'>";
                        }

                         ?>
                        
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
