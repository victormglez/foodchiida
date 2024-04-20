<?php
    print_r($_POST);
    if(!isset($_POST['idProducto'])){
        header('Location: ../menuEmpresa.php?mensaje=error');
        exit();
    }
    if(isset($_POST['btn_edit_producto'])){
        include_once 'conexion.php';

        $idProducto = $_POST['idProducto'];
        $nameProd = $_POST['nameProducto'];
        $descPro = $_POST['descrProducto'];
        $pricePro = $_POST['priceProducto'];
        //Variables para la foto
        $imgPro = $_FILES['imgProducto'];
        $imgPro_Name = $_FILES['imgProducto']['name'];
        $imgPro_Size = $_FILES['imgProducto']['size'];
        $imgPro_tmp = $_FILES['imgProducto']['tmp_name'];
        $imgPro_error = $_FILES['imgProducto']['error'];
        

        //Checa las imagenes
        if($imgPro_error === 0){
            if($imgPro_Size > 1250000){
                header('Location: editarProducto_Empresa.php?mensaje=error-img-2');
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
                    header('Location: editarProducto_Empresa.php?mensaje=error-img-3');
                    exit();
                }
            }
        } else {
            header('Location: editarProducto_Empresa.php?mensaje=error-img');
            exit();
        }

        $sentencia = $bd->prepare("UPDATE productos SET nameProduct=:nameProducto, descriptionProduct=:descrProducto, priceProduct=:priceProducto, photoProduct=:imgProducto WHERE idProduct=:idProducto;");
        $sentencia->bindValue(':idProducto',$idProducto,PDO::PARAM_STR);
        $sentencia->bindValue(':nameProducto',$nameProd,PDO::PARAM_STR);
        $sentencia->bindValue(':descrProducto',$descPro,PDO::PARAM_STR);
        $sentencia->bindValue(':priceProducto',$pricePro,PDO::PARAM_STR);
        $sentencia->bindValue(':imgProducto',$new_img_name,PDO::PARAM_STR);
        $resultado = $sentencia->execute();

        if($resultado === TRUE){
            header('Location: ../menuEmpresa.php?mensaje=editado');
        } else {
            header('Location: ../menuEmpresa.php?mensaje=error-2');
            exit();
        }
    }
?>