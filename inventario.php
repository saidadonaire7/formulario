<?php
include("conexion.php");

if(isset($_POST['guardar'])){

    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];

    $conexion->query("INSERT INTO productos(producto,cantidad,precio)
    VALUES('$producto','$cantidad','$precio')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Inventario</title>

<style>
table{
width:100%;
border-collapse:collapse;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

.editar{
color:blue;
text-decoration:none;
font-weight:bold;
}

.eliminar{
color:red;
text-decoration:none;
font-weight:bold;
}
</style>

</head>
<body>

<h2>Inventario</h2>

<form method="POST">

<input type="text" name="producto" placeholder="Producto" required>

<input type="number" name="cantidad" placeholder="Cantidad" required>

<input type="number" step="0.01" name="precio" placeholder="Precio" required>

<input type="submit" name="guardar" value="Agregar">

</form>

<table>

<tr>
<th>ID</th>
<th>Producto</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Acciones</th>
</tr>

<?php

$consulta=$conexion->query("SELECT * FROM productos");

while($fila=$consulta->fetch_assoc()){

echo "<tr>

<td>".$fila['id']."</td>

<td>".$fila['producto']."</td>

<td>".$fila['cantidad']."</td>

<td>".$fila['precio']."</td>

<td>

<a class='editar' href='editar.php?id=".$fila['id']."'>Editar</a>

|

<a class='eliminar' href='eliminar.php?id=".$fila['id']."' onclick='return confirm(\"¿Eliminar producto?\")'>Eliminar</a>

</td>

</tr>";

}

?>

</table>

</body>
</html>