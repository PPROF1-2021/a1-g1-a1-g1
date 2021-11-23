<?php
require './php/connectDataBase.php';

session_start();
if (!empty($_POST)) {
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "SELECT idUsuario, Nombre, Apellido, idEmpresas FROM Usuarios
          		WHERE Correo = '$email' AND Correo = '$email'";
	$res = $connection->query($sql);
	if ($res) {
		$user = $res->fetch_assoc();
		$_SESSION['user'] = $user;
		header("Location: ./gestor.php");
	}
	else{
        console_log("Error: " . $sql . "<br>" . mysqli_error($connection));
		echo "<script> alert('Usuario o contraseña incorrectos'); </script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="apple-touch-icon" sizes="180x180" href="./icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
	<link rel="manifest" href="./icons/site.webmanifest">
	<link rel="mask-icon" href="./icons/safari-pinned-tab.svg" color="#00324a">
	<link rel="shortcut icon" href="./icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00324a">
	<meta name="msapplication-config" content="./icons/browserconfig.xml">
	<meta name="theme-color" content="#00324a">

	<!-- implementacion de bibliotecas de bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- en este pequeño bloque se importo los elementos neceasrios de bootstrap -->

	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/gs-icofont/style.css">
</head>

<body>
	<header>
		<!-- Con esto se implementa Bootstrap 4 en el nav de este archivo -->
		<nav class="navbar navbar-expand-lg bg-primary navbar-dark text text-white justify-content-between">
			<a class="navbar-brand" href="index.php">
				<img src="img/logo.svg" alt="logo" class="logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="navlink" href="index.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="navlink" href="pag_info.php">Quiénes Somos?</a>
						<!--Se agrega el acceso a la pagina de informacion-->
					</li>
					<li class="nav-item dropdown">
						<a class="navlink dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Registrarse
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="registro-usuario.php">Para mí</a></li>
							<li><a class="dropdown-item" href="registro-empresa.php">Para empresa</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<main>

		<!-- modifique container como contenedor ("deje container como clase de bootstrap") para que se vuelva responsive-design asi no hay problema -->
		<div class="col-lg-3 container-lg contenedor pt-3">
			<h3 class="title">Login</h3>
			<!-- con la propiedade container-fluid de bootstrap nos aseguramos de un formulario de ancho de la ventan completa -->
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="login-form container-fluid">
				<span>Email</span>
				<!-- utilizamos form-group que es un grupo de formulario pero me apoyo de la caracteristica "responsive-design" de bootstrap -->
				<div class="form-group input-container">
					<i class="icono-email"></i>
					<!-- Tomamos la caracteristica form-control para estilo completo y relleno suficiente, pertence a bootstrap -->
					<input name="email" class="form-control" type="email" placeholder="Ingrese su correo electrónico">
					<div class="invalid-tooltip"></div>
				</div>

				<!-- añado el form-group propiedad de bootstrap para la implementacion del mismo y ayuda la caracteristica "responsive-design" -->
				<span>Contraseña</span>
				<div class="form-group input-container">
					<i class="icono-key"></i>
					<!-- se añade la clase Bootstrap "form-control para implementacion de los estilos de bootstrap" -->
					<input name="password" class="form-control" type="password" placeholder="Ingrese su contraseña">
					<div class="invalid-tooltip"></div>
				</div>

				<!-- añado el form-group propiedad de bootstrap para la implementacion del mismo y ayuda la caracteristica "responsive-design" -->
				<span>Rol</span>
				<div class="form-group input-container">
					<i class="icono-adn"></i>
					<!-- se añade la clase Bootstrap "form-control para implementacion de los estilos de bootstrap" -->
					<select class="form-control" name="rol" required>
						<option value="-1" selected disabled>Seleccione un rol</option>
						<option value="1">Administrador</option>
						<option value="2">Repositor</option>
						<option value="3">Cajero</option>
					</select>
				</div>
				<div class="link-container">
					<button class="formlink" type="button" onclick="toggleMenu('dropReg')">¿Todavia no esta registrado? Registrese</button>
					<div id="dropReg" class="drop-menu hidden">
						<a class="dropdown-item" href="registro-usuario.php">Para mí</a>
						<a class="dropdown-item" href="registro-empresa.php">Para empresa</a>
					</div>
				</div>
				<div class="actions">
					<!-- se reescriben algunas propiedades para mantener el estilo antiguo presentes en style.css-->
					<button class="btn btn-primary">INGRESAR</button>
				</div>
			</form>
		</div>
	</main>

	<footer id="piePagina" class="container-fluid d-flex flex-column">
		<div class="row d-flex justify-content-around">
			<div class="form-container col-4">
				<form id="formContacto" class="pb-5 pt-5 container no-gutters">
					<legend>Contactanos</legend>
					<div class="row">
						<div class="col-6">
							<span>Nombre</span>
							<!-- utilizamos form-group que es un grupo de formulario pero me apoyo de la caracteristica "responsive-design" de bootstrap -->
							<div class="form-group input-container">
								<i class="icono-user"></i>

								<!-- Tomamos la caracteristica form-control para estilo completo y relleno suficiente, pertence a bootstrap borre logininput pues no lo encontre en css avisenme si hice algo mal -->
								<input class="form-control" type="text" required placeholder="Ingrese su nombre">
							</div>
						</div>

						<div class="col-6">
							<span>Apellido</span>
							<!-- utilizamos form-group que es un grupo de formulario pero me apoyo de la caracteristica "responsive-design" de bootstrap -->
							<div class="form-group input-container ">
								<i class="icono-user"></i>
								<!-- Tomamos la caracteristica form-control para estilo completo y relleno suficiente, pertence a bootstrap borre logininput pues no lo encontre en css avisenme si hice algo mal -->
								<input class="form-control" type="text" required placeholder="Ingrese su apellido">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span>Correo</span>
							<!-- utilizamos form-group que es un grupo de formulario pero me apoyo de la caracteristica "responsive-design" de bootstrap -->
							<div class="form-group input-container ">
								<i class="icono-email"></i>
								<!-- Tomamos la caracteristica form-control para estilo completo y relleno suficiente, pertence a bootstrap borre logininput pues no lo encontre en css avisenme si hice algo mal -->
								<input class="form-control" type="email" required placeholder="Ingrese su correo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<span>Mensaje</span>
							<!-- utilizamos form-group que es un grupo de formulario pero me apoyo de la caracteristica "responsive-design" de bootstrap -->
							<div class="form-group input-container ">
								<i class="icono-mensaje"></i>
								<!-- Tomamos la caracteristica form-control para estilo completo y relleno suficiente, pertence a bootstrap borre logininput pues no lo encontre en css avisenme si hice algo mal -->
								<textarea class="form-control" type="email" required placeholder="Ingrese su mensaje"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<button class="action-button col-12" type="submit">Enviar mensaje</button>
						</div>
					</div>
				</form>
			</div>

			<div class="contact-info col-4 py-5">
				<h3 class="titulo">Informacion de contacto</h3>

				<span><i class="icono-home"></i> Argentina, Cordoba, Cordoba</span>
				<span><i class="icono-mensaje"></i> gestor.stock@gmail.com</span>
				<span><i class="icono-telefono"></i> +54 351 347 5441</span>
			</div>
		</div>
		<hr class="footer-divider">
		<span class="footer-legend">Sitio diseñado y desarrollado por Grupo1 PP TSDWAD ISPC Cohorte 2021©</span>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/dropmenu.js"></script>
</body>

</html>