<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Control de Ventas</title>
    <link rel="icon" href="../images/modif.png">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
    <?php
	    require '../php/conexionbd.php';
	    $alert = '';
	    session_start();
	    if (empty($_SESSION['active'])) {
	    	header('location: ../');
	    }
    ?>
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
    <div>
        <h2>Modificar Venta</h2>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th class="table_header id">Num. Registro</th>
                    <th class="table_header num_ventas">Número de ventas</th>
                    <th class="table_header total_ventas">Total en ventas</th>
                    <th class="table_header fecha">Fecha</th>
                </tr>
            </thead>
            <?php
				$sql="SELECT * FROM ventas";
				$result=mysqli_query($conn,$sql);
			?>
            <tbody>
                <?php
                    $sql="SELECT * FROM ventas";
                    $result=mysqli_query($conn,$sql);

                    while ($ventas=mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td class="table_row id"><?php echo $ventas['id'];?></td>
                    <td class="table_row num_ventas"><?php echo $ventas['num_ventas'];?></td>
                    <td class="table_row total_ventas"><?php echo '$' . number_format($ventas['total_ventas'],2);?></td>
                    <td class="table_row fecha"><?php echo $ventas['fecha'];?></td>
                    <td><a href="mod.php?id=<?php echo $ventas['id']; ?>" alt="Editar"><i class="fas fa-edit"></i></a></td>
                </tr>
                <?php
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>
