<?php
	require '../php/conexionbd.php';
	$alert = '';
	session_start();
	if (empty($_SESSION['active'])) {
		header('location: ../');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Control de Ventas</title>
	<link rel="icon" href="../images/clipboard.png">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
	<div>
		<ul>
		  <li>
		  	<a href="index.php" class="active">Ver</a>
		  </li>
		  <li>
		  	<a href="registrar.php">Registrar</a>
		  </li>
		  <li>
		  	<a href="modificar.php">Modificar</a>
		  </li>
		  <li>
		  	<a href="eliminar.php">Eliminar</a>
		  </li>
		  <li style="float:right">
		  	<a href="../php/salir.php" class="sesion">Cerrar sesión</a>
		  </li>
		</ul>
	</div>
	<div style="text-align: center; color: #3f51b5;">
		<u><h2>Ventas Registradas</h2></u>
	</div>
	<div>
		<table text-align: center;">
			<thead>
				<tr>
					<th>Num. Registro</th>
				    <th>Número de ventas</th>
				    <th>Total en ventas</th>
				    <th>Fecha</th>
				</tr>
			</thead>
			<?php
				$sql="SELECT * FROM ventas";
				$result=mysqli_query($conn,$sql);

				while ($ventas=mysqli_fetch_array($result)) {
			?>
			<tbody>
				<tr>
					<td><?php echo $ventas['id'];?></td>
					<td><?php echo $ventas['num_ventas'];?></td>
					<td><?php echo $ventas['total_ventas'];?></td>
					<td><?php echo $ventas['fecha'];?></td>
				</tr>
			</tbody>
			<?php
				}
			?>
		</table>
	</div>
</body>
</html>
