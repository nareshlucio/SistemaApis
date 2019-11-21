<?php
	function conexion(){
		$result = new mysqli('mysql.webcindario.com', 'apisnaresh', 'apisnaresh', 'api'); 
   		if (!$result)
     		throw new Exception('<h1>No se Pudo Conectar con la BD</h1>');
   		else
     		return $result;
	}
	class BD
	{
		private $host = 'localhost';
		private $db = 'api';
		private $user = 'root';
		private $pass ='';
		private $charset = 'utf8_spanish_ci';
		public function __construct()
		{
			$this->host = 'localhost';
			$this->db = 'api';
			$this->user = 'root';
			$this->pass = '';
			$this->charset = 'utf8_spanish_ci';
		}
		public function conexionPDO(){
		try {
			$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
						PDO::ATTR_EMULATE_PREPARES => false
			];
    		$pdo = new PDO('mysql:host=mysql.webcindario.com;dbname=apisnaresh', 'apisnaresh', 'apisnaresh', $options);
    		return $pdo;
		} catch (PDOException $e) {
    		echo 'Falló la conexión: ' . $e->getMessage();
    		die();
			}
		}
	}