<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Services Rest Api-Login</title>
</head>
<body style="background-image: url(assets/images/fondo.gif); background-attachment: fixed; background-size: auto; background-repeat: no-repeat;">
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
                    <div class="card-header">
                    <?php 
                        if (isset($mensError)) {
                            echo "<div class='alert alert-warning' role='alert'>";
                            echo "<span class='alert-inner--icon'><i class='fas fa-exclamation-triangle'></i></i></span>";
                            echo "<span class='alert-inner--text'><strong>Warning!</strong> ".$mensError." </span>";
                            echo "</div>";
                        }
                     ?>
                    </div>
                    <article class="card-body">
                        <a href="Vista/formR.html" class="float-right btn btn-outline-primary">Registrarse</a>
                        <h4 class="card-title mb-4 mt-1">Login</h4>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label>Tu Correo Electronico o Usuario</label>
                                <input name="correo" class="form-control" placeholder="Email" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <a class="float-right" href="Vista/recuperar.html">Olvide mi contraseña?</a>
                                <label>Tu Contraseña</label>
                                <input class="form-control" placeholder="******" type="password" name="contraseña">
                            </div> <!-- form-group// --> 
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Iniciar Sesion</button>
                            </div> <!-- form-group// -->                                                         
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
</body>
</html>
