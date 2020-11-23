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
header('Content-Type: text/html; charset=UTF-8');
include_once '../../conexion.php';
if(isset($_GET['idEliminar']))
{
	$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
	$sqlConsulta="DELETE FROM Productos WHERE Id=".$_GET['idEliminar'];
	$resultado=$mysqlConexion->query($sqlConsulta);
	header("Location: $_SERVER[PHP_SELF]");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <title>ZAGA</title>
    <script type="text/javascript">
			function editar_id(id){
				if(confirm('¿Desea modificar?'))
				{
					window.location.href='editarProducto.php?idEditar='+id;
				}
			}
			function eliminar_id(id){
				if(confirm('¿Desea eliminar?'))
				{
					window.location.href='productos.php?idEliminar='+id;
				}
			}

		</script>
</head>

    <body >
	<!-- Header -->
	<header id="header" >
	<h1><strong><a href="../../index.php">ZAGA</a></strong></h1>
	<nav id="nav">
		<ul>
			<li><a href="../../index.php">Inicio</a></li>
			<li><a href="../../nosotros.php">Nosotros</a></li>			
			
			<?php
				if($usuarioSesion<>'' && $tipoSesion==1)
					{
			?>
				<li><a href="../../Administracion/administrar.php">Administración</a></li>
			<?php
				}
			?>
			<li><a href="../../contactanos.php">Contáctanos</a></li>
			<li>
				<a href="../../logout.php" class="special big">
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
				<h2>Destinos</h2>
				<p>Viaje seguro</p>
            </header>
			<a href="nuevoProducto.php">Agregar</a>
			<a href="../administrar.php">Volver</a>
            <div>
					<table>
						<tr>
							<th>ID</th>
							<th>DESTINO</th>
							<th>REGION</th>
							<th>PRECIO</th>
							<th>EXISTENCIA</th>
							<th></th>
						</tr>
							<?PHP
								include_once '../../conexion.php';
								$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
								$consulta="SELECT * FROM productos";
								$resultado=$mysqlConexion->query($consulta);
								while($registro=$resultado->fetch_assoc())
								{									
									?>
									<tr>
										<td><?PHP echo $registro["Id"];?></td>
										<td><?PHP echo $registro["Nombre"];?></td>
										<td><?PHP echo $registro["IdTipoProducto"];?></td>
										<td><?PHP echo $registro["precio"];?></td>
										<td><?PHP echo $registro["Existencia"];?></td>
										<td>
										 <a href="javascript:editar_id('<?php echo $registro["Id"];?>')"><img src="../../img/Editar.png" alt=""> </a>
										 <a href="javascript:eliminar_id('<?php echo $registro["Id"];?>')"><img src="../../img/Cancelar.png" alt=""> </a>
										 </td>
									</tr>
									<?PHP
								}
								
							?>
					</table>
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