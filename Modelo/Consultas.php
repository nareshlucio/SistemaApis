<?php 
	require_once 'BD.php';
	class Consultas extends BD
	{
		public $id_usuario;
		public $usuario;
		public $Correo;

		public function RegistroUsu($nom, $Ap, $Usu, $Corr, $pass){
			$query = $this->conexionPDO()->prepare("INSERT INTO usuarios(nombres, apellidos, alias, correoE, password) VALUES (:nom, :Apes, :usu, :Corr, :pass)");
			if($query->execute(["nom"=>$nom, "Apes"=>$Ap, "usu"=>$Usu, "Corr"=>$Corr,"pass"=>$pass]))
				return true;
			else {
				return false;
			}
		}

		public function ExisteCorreo($correo){
			$query = $this->conexionPDO()->prepare("SELECT correoE FROM usuarios WHERE correoE=:corr");
			$query->execute(["corr"=> $correo]);
			foreach ($query as $row) {
				if($row['correoE'] == $correo)
					return true;
				else
					return false;
			}
		}

		public function ExisteUsuario($usuario){
			$query = $this->conexionPDO()->prepare("SELECT alias FROM usuarios WHERE alias=:usu");
			$query->execute(["usu"=> $usuario]);
			foreach ($query as $row) {
				if($row['alias'] == $usuario)
					return true;
				else
					return false;
			}
		}

		public function ActualizarContra($con, $id){
			$sql = $this->conexionPDO()->prepare("UPDATE usuarios SET password=:con WHERE Id_usuario=:id");
			if ($sql->execute(["con"=>$con, "id"=>$id]))
				return true;
			else
				return false;
		}

		public function StringAletorio($long){
			$universo = "0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ!#$%&()¡!°|*+-";
			$num_uni = strlen($universo);
			$stringnueva="";
			for ($i=0; $i < $long; $i++) { 
				$stringnueva .= $universo[rand(0, $num_uni-1)];
			}
			return $stringnueva;
		}
		
		public function ExistCorreo_recuperar($cor){
			$querycorr = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE correoE = :cor");
			$querycorr->execute(['cor' =>$cor]);
			foreach ($querycorr as $rows) {
				if ($cor === $rows['correoE']){
					$this->id_usuario = $rows['Id_usuario'];
					$this->usuario = $rows['alias'];
					$this->Correo = $rows['correoE'];
					$String_S = $this->StringAletorio(20);
					$str = $String_S.$this->usuario;
					$url = $str;
					return $url;
				}
			}
		}

		public function url_secreta_existe($url){
			$id = NULL;
			try {
				$sql = $this->conexionPDO()->prepare("SELECT * FROM recuperaciones WHERE url_secreta =:url");
					$sql->execute(['url' => $url]);
					$res = $sql->fetch();
				if(!empty($res))
					$id = $res['usuario_id'];

			} catch(PDOException $ese){
				print 'ERROR'.$ese->getMessage();
			}
			return $id;
		}

		public function Borrar_Cambio($id_usuario){
			$sql = $this->conexionPDO()->prepare("DELETE FROM recuperaciones WHERE usuario_id= :ids");
			if($sql->execute(["ids"=>$id_usuario]))
				return true;
			else 
				return false;
		}
	}