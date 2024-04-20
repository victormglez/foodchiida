<?php
    print_r($_POST);
   if(!isset($_POST['idUser'])){
        header('Location: ../menuEmpresa.php?mensaje=error');
        exit();
    }
    if(isset($_POST['btn_edit_usuario'])){
        include_once 'conexion.php';
        $nameComp = $_POST['nameCompany'];
        $emailComp= $_POST['emailCompany'];
        $ubiComp = $_POST['ubiCompany'];
        $phoneComp = $_POST['phoneCompany'];

        $sentencia = $bd->prepare("UPDATE usuarios SET nombre=:nameCompany, correo=:emailCompany, ubicacion=:ubiCompany, telefono=:phoneCompany WHERE id_usuario=:idUser;");
        $sentencia->bindValue(':nameCompany',$nameComp,PDO::PARAM_STR);
        $sentencia->bindValue(':emailCompany',$emailComp,PDO::PARAM_STR);
        $sentencia->bindValue(':ubiCompany',$ubiComp,PDO::PARAM_STR);
        $sentencia->bindValue(':phoneCompany',$phoneComp,PDO::PARAM_STR);
        $resultado = $sentencia->execute();

        if($resultado === TRUE){
            header('Location: ../menuEmpresa.php?mensaje=editado');
        } else {
            header('Location: ../menuEmpresa.php?mensaje=error-2');
            exit();
        }
    }
?>