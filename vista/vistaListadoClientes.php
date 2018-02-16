<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<title>Clientes</title>

<style>
#clientes {
/*    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;*/
    width: 50%;
}

#clientes td, #clientes th {
    border: 1px solid #ddd;
    padding: 8px;
}

#clientes tr:nth-child(even){background-color: #f2f2f2;}

#clientes tr:hover {background-color: #ddd;}

#clientes th {
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


<table id="clientes" >
	<tr>
		<th><strong>Nombre</strong></th>
		<th><strong>Apellidos</strong></th>
                <th><strong>Teléfono</strong></th>
	</tr>
     <?php
    for ($i = 0; $i < count($datos); $i ++) {
        ?>
     	<tr>
		<td><?php echo $datos[$i]['Nombre'];?></td>
		<td><?php echo $datos[$i]['Apellidos'];?></td>
		<td><?php echo $datos[$i]['Telefono'];?></td>                

	</tr>
		<?php } ?>
</table>
