<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="text" name="user" placeholder="Ingrese su Usuario"><br>
    <input type="password" name="pass" placeholder="Ingrese su contraseña"><br>
    <input type="submit" name="submit" value="Ingresar"><br>
</form>
<?php
if (!empty($_POST)) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    require_once "clases/Usuario.php";
    $usuario = new Usuario();
    $resultados = $usuario->traerDatos();

    $id = $usuario->buscarUsuario($resultados, $user);

    if ($id!=0) {
        if($usuario->validarContraseña($id, $pass)){
            session_start();
            $_SESSION["user"] = "Omar";
            header("location: bienvenido.php");
        }else{
            echo "<p style='color: red'>Usuario y/o contraseña erroneo</p>";
        }
    } else {
        echo "<p style='color: red'>Usuario y/o contraseña erroneo</p>";
    }

}
