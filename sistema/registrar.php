<?php
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../');
        exit;
    }
    require '../php/conexionbd.php';

    if (isset($_POST['numventas']) && !empty($_POST['numventas']) &&
        isset($_POST['totventas']) && !empty($_POST['totventas']) &&
        isset($_POST['fecventas']) && !empty($_POST['fecventas'])) {

        $numv = $_POST['numventas'];
        $totv = $_POST['totventas'];
        $fecv = $_POST['fecventas'];
        $sql = "INSERT INTO ventas  (num_ventas, total_ventas, fecha) VALUES ('$numv', '$totv', '$fecv')";

        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Registro: Correcto");</script>';
        } else {
            echo '<script language="javascript">alert("Registro: Incorrecto");</script>';
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Control de Ventas</title>
    <link rel="icon" href="../images/check.png">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div>
        <ul>
            <li>
                <a href="index.php">Ver</a>
            </li>
            <li>
                <a href="registrar.php" class="active">Registrar</a>
            </li>
            <li>
                <a href="modificar.php">Modificar / Borrar</a>
            </li>
            <li style="float:right">
                <a href="../php/salir.php" class="sesion">Cerrar sesión</a>
            </li>
        </ul>
    </div>
    <div>
        <h2>Registrar Venta</h2>
    </div>
    <div>
        <form action="" method="POST">
            <!--Formulario para registro de venta-->
            <div class="login">
                <div class="textbox">
                    <label for="numventas">Número de ventas:</label><br>
                    <i class="fas fa-clipboard-check"></i>
                    <input type="number" id="numventas" name="numventas" min="1" autocomplete="off" required>
                </div>
                <div class="textbox">
                    <label for="totventas">Total en ventas:</label><br>
                    <i class="fas fa-dollar-sign"></i>
                    <input id="totventas" name="totventas" type="number" min="0.00" step="1.00" autocomplete="off" required>
                </div>
                <div class="textbox">
                    <label for="fecventas">Fecha:</label><br>
                    <i class="fas fa-calendar-alt"></i>
                    <input id="fecventas" type="date" name="fecventas" autocomplete="off" required>
                </div>
                <div class="alert" align-te></div>
                <input class="btn" type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>

</html>
