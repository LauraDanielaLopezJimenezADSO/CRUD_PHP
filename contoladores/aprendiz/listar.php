<?php 

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");


$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);

$lista = $aprendiz->getAll();

?>
<table border="1">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>DNI</th>
        <th>Cuenta</th>
        <th>Promedio</th>
        <th>Acciones</th>
    </thead>
    <tbody>

        <?php
        for ($i=0; $i < count($lista); $i++) {
        ?>

        <tr>
            <td> <?= $lista[$i]["firts_name"];?> </td> 
            <td> <?= $lista[$i]["last_name"];?> </td>
            <td> <?= $lista[$i]["email"];?> </td>
            <td> <?= $lista[$i]["phone"];?> </td>
            <td> <?= $lista[$i]["dni"];?> </td>
            <td> <?= $lista[$i]["user_account"];?> </td>
            <td> <?= $lista[$i]["average"];?> </td>
            <td>
                <div>
                    <a href="editar.php?id=<?= $lista[$i]['id']?>">Editar</a>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="id" value="<?= $lista[$i]['id']?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </div>
            </td>
        </tr> 
        <?php } ?>

    </tbody>
</table>
<?php
// echo "<pre>";
// var_dump($data);
// echo "</pre>";

// for ($i=0; $i < count($lista); $i++) { 
//     echo "<pre>";
//     print_r($lista[$i])["firts_name"];
//     echo "</pre>";
// }