<?php
$id = $_POST["id"];
include_once "clases/Poblador.php";
$poblador = new Poblador();
$resultado = $poblador->traerPorId($id);

?>
<form method="post" action="actualizarPoblador.php">
    <input type="text" name="nombres" placeholder="Nombres" value="<?=$resultado[1]?>"><br>
    <input type="text" name="apellidos" placeholder="Apellidos" value="<?=$resultado[2]?>"><br>
    <input type="number" name="idUsuario" placeholder="Id Usuario" value=<?=$resultado[3]?> disabled><br>
    <input type="number" name="DNI" placeholder="DNI" value="<?=$resultado[4]?>"><br>
    <input type="hidden" name="id" value=<?=$resultado[0]?>><br>
    <input type="submit" name="submit" value="Actualizar">
</form>
<?php

if(isset($_POST["submit"])){
    $nombreGuardar = $_POST["nombres"];
    $apellidosGuardar = $_POST["apellidos"];
    $idGuardar = $_POST["id"];
    $filasAfectadas = $poblador->actualizar($nombreGuardar, $apellidosGuardar, $idGuardar,$DNIGuardar);
    if($filasAfectadas != 0){
        header("Location: verPobladores.php");
    }else{
        echo "Error Actualizar";
    }
}
