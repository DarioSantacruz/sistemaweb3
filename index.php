<?php //Se hace el inicio de sesión del sistema
	$alert = '';
	session_start(); 
	if (!empty($_SESSION['active'])) { //Se comprueba si existe una sesión activa
		header('location: sistema/');
	}
	else{ 
		if (!empty($_POST)){ //Se comprueba si los input del login estan vacios
			if (empty($_POST['username1']) || empty($_POST['password1'])) {
				$alert = 'Ingrese su usuario y contraseña';
			}
			else{
				require 'php/conexionbd.php'; //Conexión a la base de datos

				$user = $_POST['username1'];
				$psw = $_POST['password1'];

				$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE username = '$user' AND password = '$psw'");
				$result = mysqli_num_rows($query);

				if ($result > 0) {  //Guardar la información del usuario activo
					$data = mysqli_fetch_array($query);
					$_SESSION['active'] = true;
					$_SESSION['idus'] = $data['id'];
					$_SESSION['usernameus'] = $data['username'];
					$_SESSION['passwordus'] = $data['password'];

					header('location: sistema/');
				}
				else{
					$alert = 'Usuario y/o contraseña incorrecto';
					session_destroy();
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head> <!--Atributos necesarios para el funcionamiento-->
	<meta charset="utf-8"> 
	<title>Control de Ventas</title>
	<link rel="icon" href="images/open-book.png">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
	<form action= "" method="POST"> <!--Formulario para el inicio de sesión-->
	<div class="login-box">
		<h1>Iniciar sesión</h1>
		<div class="textbox">
			<i class="fas fa-user"></i>
			<input type="text" placeholder="Usuario" name="username1" autocomplete="off" required>
		</div>
		<div class="textbox">
			<i class="fas fa-lock"></i>
			<input type="password" placeholder="Contraseña" name="password1" autocomplete="off" required>
		</div>
		<div class="alert" style="text-align: center;"><?php echo isset($alert)? $alert : ''; ?></div>
		<input class="btn" type="submit" value="Iniciar sesión">
	</div>
	</form>
</body>
</html>
