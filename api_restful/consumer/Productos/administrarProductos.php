<?php
//Crear la vista para mostrar en pantalla todos los registros de la tabla categoria

//consumir el API_Restful

$endpoint="http://127.0.0.1/parcial2/api_restful/controllers/productos.php?op=selectall";

//Convertir el JSON en un objeto de tipo array assoc
$datos=json_decode(file_get_contents($endpoint),true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Administrar Productos</title>
</head>
<body>
<br>
<center>
<td><a id = "start1" href='nuevoProducto.php'>Insertar Producto</a></td>
<h1>Registros de Productos</h1>


<table border=1>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Pu</th>
<th>Cantidad</th>
<th>Cat_ID</th>
<th>Acciones</th>
</tr>


<?php
for ($i=0; $i<count($datos); $i++)
{

    ?>

<tr>
<td><?php echo $datos[$i]["id"] ?></td>
<td><?php echo $datos[$i]["nombre"] ?></td>
<td><?php echo $datos[$i]["pu"] ?></td>
<td><?php echo $datos[$i]["cantidad"] ?></td>
<td><?php echo $datos[$i]["cat_id"] ?></td>
<td><a id = "start2" href="modiProducto.php?id=<?php echo $datos[$i]['id'] ?>&nombre=<?php echo $datos[$i]['nombre'] ?>&pu=<?php echo $datos[$i]['pu'] ?>&cantidad=<?php echo $datos[$i]['cantidad'] ?>&cat_id=<?php echo $datos[$i]['cat_id'] ?>">Actualizar</a><a id = "start2" href="eliminar.php?id=<?php echo $datos[$i]['id'] ?>">Eliminar</a></td>
</tr>

<?php
}
?>


</table>

</center>
<br>
<td><a id = "start1" href='../index.php'>Regresar</a></td>


</body>
</html>


