<?php
include("conexion.php");

if (isset($_POST['guardar'])) {

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE productos
            SET nombre='$nombre',
                precio='$precio',
                cantidad='$cantidad'
            WHERE codigo='$codigo'";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Producto actualizado correctamente');</script>";
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
</head>
<body>

<h2>Modificar Producto</h2>

<form method="POST">

Código:<br>
<input type="text" name="codigo" value="001"><br><br>

Nombre:<br>
<input type="text" name="nombre" value="Laptop"><br><br>

Precio:<br>
<input type="text" name="precio" value="800"><br><br>

Cantidad:<br>
<input type="text" name="cantidad" value="10"><br><br>

<input type="submit" name="guardar" value="Guardar">
<input type="reset" value="Cancelar">

</form>

<br>

<a href="consultarModificarProducto.php">Regresar</a>

</body>
</html>