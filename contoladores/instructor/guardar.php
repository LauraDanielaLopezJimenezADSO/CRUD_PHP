<?php
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

$nombre = isset($_POST['firts_name']) ? 
    ($_POST['firts_name'] != "" ? $_POST['firts_name'] : false ) : 
    false;

$last_name = isset($_POST['last_name']) ? 
($_POST['last_name'] != "" ? $_POST['last_name'] : false ) : 
false;

$birthdate = isset($_POST['birthdate']) ? 
($_POST['birthdate'] != "" ? $_POST['birthdate'] : false ) : 
false;

$email = isset($_POST['email']) ? 
($_POST['email'] != "" ? $_POST['email'] : false ) : 
false;

$phone = isset($_POST['phone']) ? 
($_POST['phone'] != "" ? $_POST['phone'] : false ) : 
false;

$dni = isset($_POST['dni']) ? 
($_POST['dni'] != "" ? $_POST['dni'] : false ) : 
false;

// $cuenta = isset($_POST['user_account']) ? 
// ($_POST['user_account'] != "" ? $_POST['user_account'] : false ) : 
// false;

// $promedio = isset($_POST['average']) ? 
// ($_POST['average'] != "" ? $_POST['average'] : false ) : 
// false;



if ($nombre && $last_name && $email && $birthdate && $phone && $dni) {
    echo "Guardar ";

    $datebase = new Database();
    $connection = $datebase->getConnection($datebase);
    $aprendiz = new Aprendiz($connection);

    $valor = $aprendiz->store([
        'firts_name' => $nombre,
        'last_name' => $last_name,
        'email' => $email,
        'birthdate' => $birthdate,
        'phone' => $phone,
        'dni' => $dni,
        'user_account' => $_POST["user_account"] ? $_POST['user_account'] : '',
        'average' => $_POST["average"] ? $_POST['average'] : '',
    ]);

    if($valor){
        header("Location: /adso/2696521/contoladores/aprendiz/listar.php");
    }

}else{
    echo "faltan campos obligatorios";
}

// var_dump($nombre);