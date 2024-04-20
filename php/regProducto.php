<?php

    session_start();

    include "conexion.php";

    if(isset($_POST['btn_submit_producto'])){
        $nameProd = $_POST['nameProducto'];
        $descPro= $_POST['descrProducto'];
        $pricePro = $_POST['priceProducto'];
        //Variables para la foto
        $imgPro = $_FILES['imgProducto'];
        $imgPro_Name = $_FILES['imgProducto']['name'];
        $imgPro_Size = $_FILES['imgProducto']['size'];
        $imgPro_tmp = $_FILES['imgProducto']['tmp_name'];
        $imgPro_error = $_FILES['imgProducto']['error'];


        $id = $_SESSION['id'];

        //Checa que no mandó formulario vacío
        if(empty($_POST['nameProducto']) || empty($_POST['descrProducto']) || empty($_POST['priceProducto']) || empty($_FILES['imgProducto'])){
            header('Location: menuEmpresa.php?mensaje=falta');
            exit();
        } 
        
        //Checa las imagenes
        if($imgPro_error === 0){
            if($imgPro_Size > 1250000){
                header('Location: menuEmpresa.php?mensaje=error-img-2');
                exit();
            } else{
                $img_ex = pathinfo($imgPro_Name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");

                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = '../uploads/'.$new_img_name;
                    move_uploaded_file($imgPro_tmp,$img_upload_path);
                } else{
                    header('Location: menuEmpresa.php?mensaje=error-img-3');
                    exit();
                }
            }
        } else {
            header('Location: menuEmpresa.php?mensaje=error-img');
            exit();
        }


        //Sentencia 
        $sentencia = $bd->prepare("INSERT INTO productos (`nameProduct`, `descriptionProduct`, `priceProduct`, `photoProduct`, `idUser`) VALUES (:nameProducto,:descrProducto,:priceProducto,:imgProducto,$id);");
        $sentencia->bindValue(':nameProducto',$nameProd,PDO::PARAM_STR);
        $sentencia->bindValue(':descrProducto',$descPro,PDO::PARAM_STR);
        $sentencia->bindValue(':priceProducto',$pricePro,PDO::PARAM_STR);
        $sentencia->bindValue(':imgProducto',$new_img_name,PDO::PARAM_STR);
        $resultado = $sentencia->execute();

        //Resultado INSERT
        if($resultado === TRUE){
            header('Location: ../menuEmpresa.php?mensaje=registrado');
        } else {
            header('Location: ../menuEmpresa.php?mensaje=error');
            exit();
        }
    }


?>