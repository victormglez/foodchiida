<?php

/*$db_username = "u470394636_admin_roles";
$db_password = "victor98A";
$host = "localhost";
$db_name = "u470394636_rol";
$errors = array();*/

$db_username = "id22064910_admin";
$db_password = "viclorvic98A#";
$host = "localhost";
$db_name = "id22064910_db_foodchiida";
$errors = array();

try{
    $bd = new PDO(
        'mysql:host=localhost;dbname='.$db_name,$db_username,$db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
}catch(Exception $errors){
    echo "Problema con la conexión: ".$errors->getMessage();
}

?>