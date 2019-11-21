<?php 
	class SesionUsuario
	{
		
		public function __construct()
		{
			session_start();
		}
		public function setCurrentUser($usuario){
			$_SESSION['Usuario'] = $usuario;
		}
		public function getCurrentUser(){
			return $_SESSION['Usuario'];
		}	
		public function CerrarSesion(){
			session_unset();
			session_destroy();
		}
	}