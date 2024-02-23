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

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $idr = $_GET['id'];
            $sql = "DELETE FROM ventas WHERE id = '$idr'";

            if (mysqli_query($conn, $sql)) {
                header('location: eliminar.php');
                exit(); // Terminate script after redirect
            }
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
        <h2>Eliminar Venta</h2>
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
    <table>
            <thead>
                <tr>
                    <th class="table_header id">Num. Registro</th>
                    <th class="table_header num_ventas">Número de ventas</th>
                    <th class="table_header total_ventas">Total en ventas</th>
                    <th class="table_header fecha">Fecha</th>
                </tr>
            </thead>
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
                    <td><a href="mod.php?id=<?php echo $ventas['id']; ?>" alt="Editar"><i class="fas fa-edit"></i></a>
                    <?php
                        echo "<a href='eliminar.php?id=" .
                        $ventas['id'] .
                        "'><img class='delete_icon' src='../images/cross.png' alt='Borrar registro'></a>"
                        ?>
                    </td>
                </tr>
                <?php
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>
