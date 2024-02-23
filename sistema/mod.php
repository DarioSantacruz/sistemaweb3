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

        if (!empty($_POST)) {
            $alert='';
            if (empty($_POST['numv']) || empty($_POST['totv']) || empty($_POST['fecv'])) {
                $alert='<br>¡Todos los campos son obligatorios!</br>';
            }else{
                $id = $_GET['id'];
                $num = $_POST['numv'];
                $tot = $_POST['totv'];
                $fec = $_POST['fecv'];

                $query=mysqli_query($conn,"UPDATE ventas SET num_ventas = '$num', total_ventas = '$tot', fecha = '$fec' WHERE id = '$id'");

                header('location: modificar.php');
            }
        }
        if (empty($_GET['id'])) {
            header('location: modificar.php');
        }
        $idvnt=$_GET['id'];
        $sql=mysqli_query($conn,"SELECT * FROM ventas WHERE id = $idvnt");
        $result_sql=mysqli_num_rows($sql);

        if ($result_sql == 0) {
            header('location: modificar.php');
        }
        else {
            while ($data = mysqli_fetch_array($sql)) {
                $id = $data['id'];
                $num = $data['num_ventas'];
                $tot = $data['total_ventas'];
                $fec = $data['fecha'];
    ?>
</head>

<body>
    <div>
        <ul>
            <li style="float:left; transform: translate(35%,0%);">
                <a href="modificar.php" class="sesion"> &lt; Regresar</a> </li>
        </ul>
    </div>
    <div style="text-align: center; color: #3f51b5;">
        <h2>Modificar Venta</h2>
        <form method="POST">
            <div class="login">
                <div class="textbox">
                    <i class="fas fa-hashtag"></i>
                    <input type="text" placeholder="Número de registro" name="idv" value="<?php echo $id; ?>" disabled>
                </div>
                <div class="textbox">
                    <label for="numventas">Número de ventas:</label><br>
                    <i class="fas fa-clipboard-check"></i>
                    <input type="number" id="numventas" min="1" placeholder="Número de ventas" name="numv"
                        value="<?php echo $num; ?>">
                </div>
                <div class="textbox">
                    <label for="totventas">Total en ventas:</label><br>
                    <i class="fas fa-dollar-sign"></i>
                    <input id="totventas" type="number" name="totv" type="number" min="0.00" step="1.00"
                        value="<?php echo $tot; ?>">
                </div>
                <div class="textbox">
                    <label for="fecventas">Fecha:</label><br>
                    <i class="fas fa-calendar-alt"></i>
                    <input id="fecventas" type="date" name="fecv" value="<?php echo $fec; ?>">
                </div>
                <div class="alert" style="text-align: center;"><?php echo isset($alert)? $alert : ''; ?>
                </div>
                <input class="btn" type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
<?php
    }
}
?>

</html>
