<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
 $id = $_POST["id"];
 $nombre = $_POST["nombre"];
 $cc = $_POST["cc"];

if (isset($_POST["editar2"])) {
    include('conexion.php');
    $getmysql = new mysqlconex();
    $getconex = $getmysql->conex();


    $query = "UPDATE  alumnos SET nombre=? , cc=? WHERE id=?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sii",$nombre, $cc, $id); // Assuming both Nombre and Cc are strings (hence "ss" format)
    mysqli_stmt_execute($sentencia);
   $afectado = mysqli_stmt_affected_rows($sentencia);

   if ($afectado == 1) {
            echo "<script>alert('Se edito exitosamente el datos');location.href='../index.php'</script>";
    } else {
            echo "<script>alert('No se edito el  datos'); location.href='../index.php'</script>";
    }
mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>

<form action="editar.php" method="Post">
       <input type="hidden" value="<?php echo $id ?>" name="id">
       <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
        <label for="cc">CC</label><input type="number" name="cc" id="cc" value="<?php echo $id ?>">
        <input type="submit" name="editar2" value="Editar">
    </form>
</body>
</html>