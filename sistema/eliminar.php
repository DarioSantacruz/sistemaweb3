<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Control de Ventas</title>
    <link rel="icon" href="../images/cross.png">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
    <?php
	    require '../php/conexionbd.php';
	    $alert = '';
	    session_start();
	    if (empty($_SESSION['active'])) {
	    	header('location: ../');
	    }

	    require '../php/conexionbd.php';

	    if (isset($_POST['idreg']) && !empty($_POST['idreg'])) {
	    	$idr= $_POST['idreg'];
	    	$sql = "DELETE FROM ventas WHERE id = '$idr'";

	    	if (mysqli_query($conn, $sql)) {
	        	header('location: eliminar.php');
	    	}
	    	mysqli_close($conn);
	    }
    ?>
</head>

<body>
    <div>
        <ul>
            <li>
                <a href="index.php">Ver</a>
            </li>
            <li>
                <a href="registrar.php">Registrar</a>
            </li>
            <li>
                <a href="modificar.php">Modificar</a>
            </li>
            <li>
                <a href="eliminar.php" class="active">Eliminar</a>
            </li>
            <li style="float:right">
                <a href="../php/salir.php" class="sesion">Cerrar sesión</a>
            </li>
        </ul>
    </div>
    <div style="text-align: center; color: #3f51b5;">
        <u>
            <h2>Eliminar Venta</h2>
        </u>
        <form action="" method="POST">
            <div class="login">
                <div class="textbox">
                    <i class="fas fa-hashtag"></i>
                    <input type="text" placeholder="Número de registro" name="idreg" autocomplete="off">
                </div>
                <input class="btn" type="submit" value="Eliminar">
            </div>
        </form>
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
            <tbody>
                <?php
					while ($ventas=mysqli_fetch_array($result)) {
				?>
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
