<?php
$codigo1 = 123124;
$password1 = "sentencia";
$codigo2 = 234235;
$password2 = "preparada";

include_once "clases/Usuario.php";
$usuario = new Usuario($codigo1, $password1);
echo $filasAfectadas = $usuario->guardar($codigo1, $password1, $codigo2, $password2);