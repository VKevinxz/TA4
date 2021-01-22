<?php
session_start();
echo "<h1>Bienvenido: ".$_SESSION["user"]." </h1>";
echo "<li><a href='verEstudiantes.php'>Ver estudiantes</a></li>";
