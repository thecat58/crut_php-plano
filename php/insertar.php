<?php

include('conexion.php');
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $cc = $_POST["cc"];
    $query = "INSERT INTO alumnos (Nombre, Cc) VALUES (?, ?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "si", $nombre, $cc); // Assuming both Nombre and Cc are strings (hence "ss" format)
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
   
   if ($afectado == 1) {
            echo "<script>alert('Se guardaron exitosamente los datos');location.href='../index.php'</script>";
    } else {
            echo "<script>alert('No se guardaron datos'); location.href='../index.php'</script>";
    }
mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
} else {
    echo "<script>alert('Hubo un error');location.href='../index.php'</script>";

    
}

   

?>
