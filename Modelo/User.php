<?php 
	include_once 'BD.php';
	Class User extends BD
	{
		public $id_usuario;
		public $apellidos;
		public $usuario;
		public $nombres;
		public $Correo;
//---------------------------Comprueba si el Uusario escrito Existe en la BD----------------------
		public function ExistUsuario($usu, $pass){
			$query = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE alias = :usu");
			$query->execute(['usu' =>$usu]);
			foreach ($query as $rows) {
				if ($usu === $rows['alias'] && password_verify($pass, $rows['password']))
					return true;
				else 
					return false;
			}
		}
//---------------------------Comprueba si el Correo escrito Existe en la BD-------------------------
		public function ExistCorreo($cor, $pass){
			$querycorr = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE correoE = :cor");
			$querycorr->execute(['cor' =>$cor]);
			foreach ($querycorr as $rows) {
				if ($cor === $rows['correoE'] && password_verify($pass, $rows['password']))
					return true;
				else 
					return false;
			}
		}
		public function setUsuario($usuarios){
			$sql = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE alias = :usuarios");
			$sql->execute(['usuarios' =>$usuarios]);
			foreach ($sql as $row) {
				$this->id_usuario = $row['Id_usuario'];
				$this->apellidos = $row['apellidos'];
				$this->nombres = $row['nombres'];
				$this->usuario = $row['alias'];
				$this->Correo = $row['correoE'];
			}
		}
		public function setCorreo($correo){
			$sql = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE correoE = :correo");
			$sql->execute(['correo' =>$correo]);
			foreach ($sql as $row) {
				$this->id_usuario = $row['Id_usuario'];
				$this->apellidos = $row['apellidos'];
				$this->nombres = $row['nombres'];
				$this->usuario = $row['alias'];
				$this->Correo = $row['correoE'];
			}			
		}
		public function getUsuario(){
			return $this->nombres;
			return $this->usuario;
			return $this->Correo;
		}
	}