<?php
    if (isset($_POST['btn_submit_login'])) {
        session_start();
        include_once "conexion.php";
        $emailComp = $_POST['emailCompany'];
        $passComp = $_POST['passCompany'];

        //Checa que no mandó formulario vacío
        if(empty($_POST['emailCompany']) || empty($_POST['passCompany'])){
            header('Location: ../login.php?mensaje=falta');
            exit();
        } else {
            $passComp = md5($passComp);
            $sentencia = $bd->prepare("SELECT * FROM users WHERE companyMail=:emailCompany and companyPass=:passCompany;");
            $sentencia->bindValue(':emailCompany',$emailComp);
            $sentencia->bindValue(':passCompany',$passComp);
            $sentencia ->execute();
            $datos = $sentencia->fetch(PDO::FETCH_OBJ);
            //print_r($datos);

            if ($datos === FALSE){
                header('Location: ../php/login.php?mensaje=error');
                exit();
            } elseif($sentencia->rowCount()==1){
                $_SESSION['id'] = $datos->idUser;
                //$_SESSION['id'] = $datos->id_user;
                header('Location: ../menuEmpresa.php');
            }
        }
    }
?>
