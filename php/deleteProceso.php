<?php

    if(!isset($_GET['idProducto'])){
        header('Location: ../menuEmpresa.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';

    $idProduct = $_GET['idProducto'];

    $sentencia = $bd->prepare("DELETE FROM productos WHERE idProduct = ?;");
    $resultado = $sentencia->execute([$idProduct]);

    if($resultado === TRUE){
        header('Location: ../menuEmpresa.php?mensaje=eliminado');
    } else {
        header('Location: ../menuEmpresa.php?mensaje=error');
        exit();
    }

?>