<?php

include('conexion.php');
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];


    $query = "DELETE FROM alumnos WHERE id=?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "i", $id); // Assuming both Nombre and Cc are strings (hence "ss" format)
    mysqli_stmt_execute($sentencia);


   $afectado = mysqli_stmt_affected_rows($sentencia);
   if ($afectado == 1) {
            echo "<script>alert('Se elimino exitosamente el datos');location.href='../index.php'</script>";
    } else {
            echo "<script>alert('No se elimino datos'); location.href='../index.php'</script>";
    }
mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
} else {
    echo "<script>alert('Hubo un error');location.href='../index.php'</script>";

    
}

   

?>
