<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<title>Artículos</title>

<style>
table {
/*    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;*/
    width: 50%;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

</head>


<?php
    require_once "../controlador/controladorSeguridad.php";
?>

<a href="../vista/menu.php">Volver</a><br><br>


<table>
	<tr>
		<th><strong>Artículo</strong></th>
		<th><strong>Precio</strong></th>
                <th><strong>Categoría</strong></th>
	</tr>
     <?php
    for ($i = 0; $i < count($datos); $i ++) {
        ?>
     	<tr>
		<td><?php echo $datos[$i]['Articulo'];?></td>
		<td><?php echo $datos[$i]['Categoria'];?></td>
		<td><?php echo $datos[$i]['Precio'];?></td>                

	</tr>
		<?php } ?>
</table>
