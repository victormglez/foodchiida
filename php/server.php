<?php
session_start();

//CONECTAMOS A DB
$db_username = "u470394636_admin_roles";
$db_password = "victor98A";
$host = "localhost";
$db_name = "u470394636_rol";
$errors = array(); 

$link = mysqli_init();
$db = mysqli_real_connect($link,$host,$db_username,$db_password,$db_name);

//Variables de trabajo
$flag_id = 0;
$flag_login = 0;

//REGISTRO
if(isset($_POST['btn_submit_user'])){
    $nameComp = mysqli_real_escape_string($link,$_POST['nameCompany']);
    $emailComp= mysqli_real_escape_string($link,$_POST['emailCompany']);
    $passComp = mysqli_real_escape_string($link,$_POST['passCompany']); 
    $confirm_passComp = mysqli_real_escape_string($link,$_POST['confirm_passCompany']);
    $ubiComp = mysqli_real_escape_string($link,$_POST['ubiCompany']);
    $phoneComp = mysqli_real_escape_string($link,$_POST['phoneCompany']);

    //Checa que no mandó formulario vacío
    if(empty($nameComp)){
        array_push($errors,"Name is required");
    }
    if(empty($emailComp)){
        array_push($errors,"Email is required");
    }
    if(empty($passComp)){
        array_push($errors,"Password is required");
    }
    if(empty($confirm_passComp)){
        array_push($errors,"Password 2 is required");
    }
    if(empty($ubiComp)){
        array_push($errors,"Dirección is required");
    }
    if(empty($phoneComp)){
        array_push($errors,"Teléfono is required");
    }
    if($passComp !== $confirm_passComp) {
        echo "<script>
        alert('No fue posible crear el registro. Las contraseñas no coinciden.');
        window.location.href='/registro.php';
        </script>";
        exit();
    }
    
    //Comprobar que no exista ese CORREO
    $user_check_query = "SELECT * FROM usuarios WHERE correo ='$emailComp' LIMIT 1";
    $result = mysqli_query($link,$user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if($user['correo'] === $emailComp){
            echo "<script>
            alert('No fue posible crear el registro. El correo ya está registrado.');
            window.location.href='/registro.php';
            </script>";
            exit();
        }
    }

    //Si no hay errores, se insertan los valores
    if(count($errors)==0){
        $encrypt_pass = md5($passComp);
        $query_insert = "INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `pass1`, `ubicacion`, `telefono`) VALUES (NULL, '$nameComp', '$emailComp', '$encrypt_pass', '$ubiComp', '$phoneComp')";
        $ejecutar= mysqli_query($link,$query_insert);
        $_SESSION['emailCompany'] = $emailComp;
        $flag_id = 1;
        $id_get = "SELECT * FROM `usuarios` WHERE `correo`='$emailComp'"; //Almacena el id para relacionarlo con una tabla

        $result = $link->query($id_get);
        $row = $result->fetch_assoc();
        $id = $row["id_usuario"];

        echo "alert($encrypt_pass);";

        echo "<script>
        alert('REGISTRO EXITOSO');
        window.location.href='/login.php';
        </script>";
       //Falta el mensaje de "Ya eres parte de la familia FOODCHIIDA" (sweetAlert)

    } else{
        //Falta el mensaje de "Error al enviar registro" (sweetAlert)
    }
}

//LOGIN
/*if (isset($_POST['btn_submit_login'])) {
    $emailComp = $_POST['emailCompany'];
    $passComp = $_POST['passCompany'];

    //En caso de que les falte un dato
    if (empty($emailComp)) {
    array_push($errors, "Email is required");
    }
    if (empty($passComp)) {
    array_push($errors, "Password is required");
    }

    if (count($errors) == 0) { //Verifica que no haya errores
    $passComp = md5($passComp);
    $query_select = "SELECT * FROM `usuarios` where `correo`='$emailComp' and `pass1`='$passComp'";
    $results = mysqli_query($link, $query_select);
    if (mysqli_num_rows($results)==1) {
        $_SESSION['emailCompany'] = $emailComp;
        $emailComp = $_SESSION['emailCompany'];
        $id_get = "SELECT * FROM `usuarios` WHERE `correo`='$emailComp'"; 
        $result = $link->query($id_get);
        $row = $result->fetch_assoc();
        $id_user = $row["id_usuario"];
        $_SESSION['id_usuario'] = $id;

        header('location: ../menuEmpresa.php?id=$id_user');
    }else{
        echo "<script>
        alert('Error al ingresar');
        window.location.href='../login.php';
        </script>";
        array_push($errors, "Wrong username/password combination");
        }
    }
}*/



?>