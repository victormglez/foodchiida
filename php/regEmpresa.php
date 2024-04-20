<?php
    if (isset($_POST['btn_submit_user'])) {
        include_once "conexion.php";
        $nameComp = $_POST['nameCompany'];
        $emailComp= $_POST['emailCompany'];
        $passComp = $_POST['passCompany'];
        $confirm_passComp = $_POST['confirm_passCompany'];
        $ubiComp = $_POST['ubiCompany'];
        $phoneComp = $_POST['phoneCompany'];

        //Checa si el correo existe en la bd (NO FUNCIONA)
        $query_check =  $bd->prepare("SELECT * FROM users WHERE `companyMail`=?");
        $query_check -> execute([$emailCompany]);
        $user = $query_check->fetch();

        //Checa que no mandó formulario vacío
        if(empty($_POST['nameCompany']) || empty($_POST['emailCompany']) || empty($_POST['passCompany']) || empty($_POST['confirm_passCompany'])|| empty($_POST['ubiCompany']) || empty($_POST['phoneCompany'])){
            header('Location: ../registro.php?mensaje=falta');
            exit();
        //Checa si las contraseñas son iguales
        } elseif($passComp !== $confirm_passComp){ 
            header('Location: ../registro.php?mensaje=error');
            exit();
        }elseif($user){
            header('Location: ../registro.php?mensaje=correo');
            exit(); 
        } else {
            $passComp = md5($passComp);
            $sentencia = $bd->prepare("INSERT INTO users (`companyName`, `companyMail`, `companyPass`, `companyDire`, `companyPhone`) VALUES (:nameCompany,:emailCompany,:passCompany,:ubiCompany,:phoneCompany);");
            $sentencia->bindValue(':nameCompany',$nameComp,PDO::PARAM_STR);
            $sentencia->bindValue(':emailCompany',$emailComp,PDO::PARAM_STR);
            $sentencia->bindValue(':passCompany',$passComp,PDO::PARAM_STR);
            $sentencia->bindValue(':ubiCompany',$ubiComp,PDO::PARAM_STR);
            $sentencia->bindValue(':phoneCompany',$phoneComp,PDO::PARAM_STR);
            $resultado = $sentencia->execute();

            if ($resultado === FALSE){
                header('Location: ../registro.php?mensaje=error-2');
                exit();
            } else{
                header('Location: ../login.php?mensaje=registroEmpresa');
                exit();
            }
        }
    }
?>
