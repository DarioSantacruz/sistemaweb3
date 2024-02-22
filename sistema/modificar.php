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
	<link rel="icon" href="../images/modif.png">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body style="color: white;">
	<div>
		<ul>
		  <li>
		  	<a href="index.php">Ver</a>
		  </li>
		  <li>
		  	<a href="registrar.php">Registrar</a>
		  </li>
		  <li>
		  	<a href="modificar.php" class="active">Modificar</a>
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
		<u><h2>Modificar Venta</h2></u>
	</div>
	<div>
		<table style="width:100%; text-align: center;">
			<thead>
				<tr>
					<th>Num. Registro</th>
				    <th>Número de ventas</th>
				    <th>Total en ventas</th>
				    <th>Fecha</th>
				    <th></th>
				</tr>
			</thead>
			<?php
				$sql="SELECT * FROM ventas";
				$result=mysqli_query($conn,$sql);
			?>
			<tbody >
				<?php
					while ($ventas=mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $ventas['id'];?></td>
						<td><?php echo $ventas['num_ventas'];?></td>
						<td><?php echo $ventas['total_ventas'];?></td>
						<td><?php echo $ventas['fecha'];?></td>
						<td><a href="mod.php?id=<?php echo $ventas['id']; ?>">Modificar</a></td>
					</tr>
			</tbody>
			<?php
				}
			?>
		</table>
	</div>
</body>
</html>