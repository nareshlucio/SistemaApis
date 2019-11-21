<?php
	include_once 'BD.php';

	class Recuperacion extends BD
	{
		public $id_usuario;
		public $url_secreta;
		public $fecha;

		public function __construct($id_usuario, $url_secreta, $fecha)
		{
			$this->id_usuario = $id_usuario;
			$this->url_secreta = $url_secreta;
			$this->fecha = $fecha;
		}
		public function generar_peticion($conexion, $id_usuario, $url_secreta){
			$peticion = false;
			if(isset($conexion)){
				try {
					$sql = $this->conexionPDO()->prepare("INSERT INTO recuperaciones(usuario_id, url_secreta, fecha) VALUES (:usuid, :url, NOW())");
					if($sql->execute(["usuid"=>$id_usuario, "url"=>$url_secreta]))
						$peticion = true;

				} catch (PDOException $e) {
					print 'ERROR!!!'.$e->getMessage();
				}
			}
			return $peticion;
		}
	}