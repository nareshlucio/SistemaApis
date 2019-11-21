<?php 
	include_once 'Modelo/User.php';
	include_once 'Modelo/SesionUsu.php';
	$Sesion = new SesionUsuario();
	$Usuario = new User();
	$numerrores=0;
	//Combrobacion si es que el usuario no a cerrado su sesion-------------------
	if (isset($_SESSION['Usuario'])) {
		$Usuario->setUsuario($Sesion->getCurrentUser());
		echo "<meta http-equiv='Refresh' content='0.0; URL=Vista/iniciotemp.html'>";
	//---------------------------------------------------------------------------
	//Comprobar si el Usuario inicio sesion con sus credenciales correctas	
	}else if(isset($_POST['correo']) && isset($_POST['contraseña'])){
		$Alias = $_POST['correo'];
		$Password = $_POST['contraseña'];
		if ($Usuario->ExistUsuario($Alias, $Password)) {
			$Sesion->setCurrentUser($Alias);
			$Usuario->setUsuario($Alias);
			echo "<meta http-equiv='Refresh' content='0.0; URL=Vista/iniciotemp.html'>";
		}else if($Usuario->ExistCorreo($Alias, $Password)){
			$Sesion->setCurrentUser($Alias);
			$Usuario->setCorreo($Alias);
			echo "<meta http-equiv='Refresh' content='0.0; URL=Vista/iniciotemp.html'>";
		}else{
			$mensError = "Hay un problema con su correo y/o contraseña";
			include_once 'Vista/Login.php';
		}
	}else
	include_once 'Vista/Login.php';