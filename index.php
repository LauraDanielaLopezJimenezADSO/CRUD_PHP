
<?php 

echo __DIR__;
require_once(__DIR__."/libs/Database.php");
require_once(__DIR__."/libs/Modelo.php");
include_once("clases/Aprendiz.php");


$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);

// $nombre = $_POST["first_name"];
// $nombre = $_POST["last_name"];
// $nombre = $_POST["email"];
// $nombre = $_POST["phone"];
// $nombre = $_POST["dni"];

// var_dump(!isset($_POST["first_name"]));
// die();
if(
    !isset($_POST["firts_name"]) && 
    !isset($_POST["last_name"]) &&
    !isset($_POST["email"]) && 
    !isset($_POST["phone"]) && 
    !isset($_POST["dni"]))
    {
    $aprendiz->store([
        'firts_name' => $_POST["firts_name"],
        'last_name' => $_POST["last_name"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'dni' => $_POST["dni"],
        'user_account' => $_POST["user_account"] ? $_POST['user_account'] : '',
        'user_average' => $_POST["average"] ? $_POST['average'] : '',
    ]);
}else{
    echo "no llegaron los campos";
}
?>


