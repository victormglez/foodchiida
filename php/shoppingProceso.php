<?php

use JetBrains\PhpStorm\ArrayShape;

    session_start();
    include_once 'conexion.php';

    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart'])){
            $myitems = array_column($_SESSION['cart'],'nombre_producto');
            if(in_array($_POST['nombre_producto'],$myitems)){
                echo"<script>
                    window.location.href='../index.php';
                </script>";

            }else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('nombre_producto' => $_POST['nombre_producto'],'precio_producto' => $_POST['precio_producto'],'imagen_producto' => $_POST['imagen_producto'],'ubicacion_producto' => $_POST['ubicacion_producto']);
                echo"<script>
                window.location.href='../index.php';
                </script>";
            }
        }
        else{
            $_SESSION['cart'][0] = array('nombre_producto' => $_POST['nombre_producto'],'precio_producto' => $_POST['precio_producto'],'imagen_producto' => $_POST['imagen_producto'],'ubicacion_producto' => $_POST['ubicacion_producto']);
            echo"<script>
                window.location.href='../index.php';
            </script>";
        }
    }

    if(isset($_POST['remove_producto'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['nombre_producto'] == $_POST['nombre_producto']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                /*echo"<script>
                    window.location.href='../shopping_cart.php';
                </script>";*/
                header('Location: ../shopping_cart.php?mensaje=eliminado');
            }
        }
    }

    if(isset($_POST['payment_method'])){
        if(!empty($_POST['flexRadioDefault'])){
            $radio_value = $_POST['flexRadioDefault'];
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
            }
            if($radio_value == 'credit_method' && $count > 0){
                echo"<script>
                    window.location.href='../payment_method.php';
                </script>";
            } elseif($radio_value == 'reserve_method' && $count > 0){
                echo"<script>
                    window.location.href='../reserve_method.php';
                </script>";
            } else {
                header('Location: ../shopping_cart.php?mensaje=opcion');
            }
        } else {
            header('Location: ../shopping_cart.php?mensaje=vacio');
        }
    }

?>

