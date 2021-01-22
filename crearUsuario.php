<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="number" name="codigo" placeholder="Ingrese Codigo"><br>
    <input type="password" name="password" placeholder="Ingrese Contraseña"><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(!empty($_POST)){
    $codigo = $_POST["codigo"];
    $password = $_POST["password"];

    include_once "clases/Usuario.php";
    $usuario = new Usuario($codigo, $password);
    $filasAfectadas = $usuario->guardar();
    if($filasAfectadas!=0){
        echo "guardado";
    }else{
        echo "error";
    }
}
