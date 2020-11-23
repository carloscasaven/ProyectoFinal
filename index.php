<?php
session_start();
if(isset($_SESSION['nombreUsuario']))
{
	$usuarioSesion=$_SESSION['nombreUsuario'];
	$tipoSesion=$_SESSION['tipoUsuario'];
}
else
{
	$usuarioSesion='';
	$tipoSesion='';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>ZAGA</title>
</head>

    <body class="landing">
	<!-- Header -->
	<header id="header" class="alt">
	<h1><a href="index.php">ZAGA.com</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="index.php">INICIO</a></li>
			<li><a href="nosotros.php">NOSOTROS</a></li>			
			<?php
				if($usuarioSesion<>'' && $tipoSesion==2)
					{
			?>
				<li><a href="Boletos/catalogo.php">DESTINOS</a></li>
				<li><a href="Compras/compras.php">RESERVAR BOLETOS</a></li>
			<?php
				}
			?>
			<?php
				if($usuarioSesion<>'' && $tipoSesion==1)
					{
			?>
				<li><a href="Administracion/Administrar.php">ADMINISTRACION</a></li>
			<?php
				}
			?>
			<li><a href="contactanos.php">CONTACTANOS</a></li>
			<li>
				<a href="logout.php" class="special big">
					<?php 
					if($usuarioSesion<>'')
					{
						echo $usuarioSesion;
					}
					else{
						echo "INICIAR SESION";
					}
						
					?>
				</a>
			</li>			
		</ul>
	</nav>
	</header>
	<section id="banner">
		<p>¿QUIERES VIAJAR?<br />VIAJA CON ZAGA</p>
		<ul class="actions">
			<li><a href="login.php" class="button special big">Regístrate aqui</a></li>
		</ul>
	</section>
	<footer id="footer">
		<div class="container">
			<ul class="copyright">
				<li>&copy; ZAGA</li>
				<li>Design: <a href="#">LSC</a></li>		
			</ul>
		</div>
	</footer>
	</body>
</body>
</html>