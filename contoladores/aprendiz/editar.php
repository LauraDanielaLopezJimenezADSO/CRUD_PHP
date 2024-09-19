<?php 

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");


$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);



$id = $_REQUEST['id'];

$usuario = $aprendiz->getById($id);

echo "<pre>";
print_r($usuario);
echo "</pre>";

?>

<form action="actualizar.php" method="post">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
    <div>
        <label for="firts_name">Nombre: </label>
        <input type="text" name="firts_name" value="<?= $usuario['firts_name']?> ">
    </div>
    <div>
        <label for="last_name">Apellido: </label>
        <input type="text" name="last_name" value="<?= $usuario['last_name']?> ">
    </div>
    <div>
        <label for="birthdate">Fecha de nacimiento: </label>
        <input type="date" name="birthdate" value="<?= $usuario['birthdate']?> ">
    </div>
    <div>
        <label for="email">Correo: </label>
        <input type="text" name="email" value="<?= $usuario['email']?> ">
    </div>
    <div>
        <label for="phone">Telefono: </label>    
        <input type="text" name="phone" value="<?= $usuario['phone']?> ">
    </div>
    <div>
        <label for="dni">DNI: </label>
        <input type="text" name="dni" readonly value="<?= $usuario['dni']?> " >
    </div>
    <div>
        <label for="user_account">Ficha: </label>
        <input type="text" name="user_account" value="<?= $usuario['user_account']?> ">
    </div>
    <div>
        <label for="average">Promedio: </label>
        <input type="text" name="average" value="<?= $usuario['average']?> ">
        
    </div>
    <button type="submit">Actualizar</button>
</form>