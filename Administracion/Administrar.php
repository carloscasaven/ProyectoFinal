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
    <link rel="stylesheet" href="../css/style.css" />
    <title>ZAGA</title>
</head>

    <body >
	<!-- Header -->
	<header id="header" >
	<h1><a href="../index.php">ZAGA</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="../index.php">Inicio</a></li>
			<li><a href="../nosotros.php">Nosotros</a></li>			
			<?php
				if($usuarioSesion<>'' && $tipoSesion==2)
					{
			?>
				<li><a href="../Boletos/catalogo.php">Catálogo</a></li>
				<li><a href="../Compras/compras.php">Mis Compras</a></li>
			<?php
				}
			?>
			<?php
				if($usuarioSesion<>'' && $tipoSesion==1)
					{
			?>
				<li><a href="../Administracion/administrar.php">Administración</a></li>
			<?php
				}
			?>
			<li>
				<a href="../logout.php" class="special big">
					<?php 
					if($usuarioSesion<>'')
					{
						echo $usuarioSesion;
					}
					else{
						echo "iniciar sesión";
					}
						
					?>
				</a>
			</li>			
		</ul>
	</nav>
	</header>
	<!-- Main -->
    <section id="main" class="wrapper">
		<div class="container">
			<header class="major special">
				<h3>Administracion ZAGA</h3>
				<p>viaje seguro</p>
			</header>
			<div class="row">
				<div><a href="Productos/productos.php">DESTINOS</a></div>
				<div><a href="TiposProductos/tiposProductos.php">REGION</a></div>
				<div><a href="Usuarios/usuarios.php">CLIENTES</a></div>
				<div><a href="Ventas/ventas.php">VENTAS</a></div>
			</div>
		</div>
		</section>
	<!-- Footer -->
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