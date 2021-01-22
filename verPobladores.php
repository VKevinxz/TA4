<?php
echo "<h1>Lista de Estudiantes</h1>";
include_once "clases/Estudiantes.php";
include_once "clases/Reidencia.php";
$poblador = new Estudiantes();
$resultados = $poblador->traerTodo();

echo "<table border='1'>
        <tr>
          <th>#</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>ID usuario</th>
          <th>&nbsp;</th>
        </tr>";
echo "<tr>
        <td colspan='5'>Forma Normal (fetch_assoc)</td>
      </tr>";
for ($i = 1; $i <= $resultados->num_rows; $i++) {
    $item = $resultados->fetch_assoc();
    echo "<tr>
            <td>" . $item["id"] . "</td>
            <td>" . $item["nombres"] . "</td>
            <td>" . $item["apellidos"] . "</td>
            <td>" . $item["id_usuario"] . "</td>
            <td>
                <form method='post' action='actualizarPoblador.php'>
                    <input type='hidden' name='id' value='" . $item["id"] . "'/>
                    <input type='submit' value='Actualizar'/>
                </form>
            </td>
          </tr>";
}
echo "<tr>
        <td colspan='5'>Forma Simplificada (sin fetch)</td>
      </tr>";
foreach ($resultados as $item) {
    echo "<tr>
            <td>" . $item["id"] . "</td>
            <td>" . $item["nombres"] . "</td>
            <td>" . $item["apellidos"] . "</td>
            <td>" . $item["id_usuario"] . "</td>
            <td>
                 <form method='post' action='eliminarPoblador.php'>
                    <input type='hidden' name='id' value='" . $item["id_usuario"] . "'/>
                    <input type='submit' value='Eliminar'/>
                 </form>
            </td>
          </tr>";
    $i++;
}

echo "</table>";
