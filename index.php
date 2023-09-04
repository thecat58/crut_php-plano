<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="php/insertar.php" method="Post">
        <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre">
        <label for="cc">CC</label><input type="number" name="cc" id="cc">
        <input type="submit" name="registrar" value="Registrar">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("php/conexion.php");
            $getmysql = new mysqlconex();
            $getconex = $getmysql->conex();
            $cosulta = "SELECT * FROM alumnos";
            $resultado = mysqli_query($getconex, $cosulta);
            while ($fila = mysqli_fetch_row($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila[0] . "</td>";
                echo "<td>" . $fila[1] . "</td>";
                echo "<td>" . $fila[2] . "</td>";
            echo '<td>
                <form action="php/eliminar.php" method="post">
                <input type="hidden" name="id" value='.$fila[0].'>
                <input type="hidden" name="nombre" value='.$fila[1].'>
                <input type="submit" name="eliminar" value="eliminar">
                </form>
                </td>';
            echo '<td>
                <form action="php/editar.php" method="post">
                <input type="hidden" name="id" value='.$fila[0].'>
                <input type="hidden" name="nombre" value='.$fila[1].'>
                <input type="hidden" name="cc" value='.$fila[2].'>
                <input type="submit" name="eliminar" value="editar">
                </form>
                </td>';
            echo '</tr>';
            }
            mysqli_close($getconex);
            ?>
        </tbody>
    </table>
</body>

</html>