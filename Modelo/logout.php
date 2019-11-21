<?php 
	require 'SesionUsu.php';
	$Sesion= new SesionUsuario();
	$Sesion->CerrarSesion();
	header('Location: ../index.php');
 ?>