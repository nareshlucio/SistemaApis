<?php
require 'BD.php';
include_once 'Consultas.php';
 $registro = new Consultas();
    //variables POST
    if(isset($_POST)){
    $Ap = $_POST['ape'];
    $nom = $_POST['nombres'];
    $usu = $_POST['usu'];
    $corr = $_POST['email'];
    $pass = $_POST['cont'];
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    //---------------------------------------------------------------------------------
    $correxis = $registro->ExisteCorreo($corr);
    $usuexis= $registro->ExisteUsuario($usu);
    if($correxis && $usuexis){
      echo "Estos Datos ya corresponden a un Usuario Existente";
    }else if($usuexis){
      echo "Este Alias ó Usuario ya Existe con una cuenta Ralacionada";
    }else if($correxis){
      echo "Este Correo ya Existe con una cuenta Ralacionada";
    }else{
      if($registro->RegistroUsu($nom,$Ap,$usu,$corr,$passHash)){
        echo "Registro de usuario con exito!!!";
        echo "<meta http-equiv='Refresh' content='2.0; URL=../index.php'>";
      }else 
        echo "Ocurrio Algo al Hacer el registro del Usuario";
    }
  }else{
    echo "no recibo nada";
  }
