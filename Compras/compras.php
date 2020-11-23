<?php
session_start();
if(isset($_SESSION['nombreUsuario']))
{
	$usuarioSesion=$_SESSION['nombreUsuario'];
	$tipoSesion=$_SESSION['tipoUsuario'];
	$idUsuario= $_SESSION['idUsuario'];
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
			<?php
				if($usuarioSesion<>'' && $tipoSesion==2)
					{
			?>
				<li><a href="../Boletos/catalogo.php">destinos</a></li>
				<li><a href="../Compras/compras.php">Mis Reservaciones</a></li>
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
				<a href="../logout.php" class="butto special big">
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
				<h2>Reservaciones</h2>
				<p>viaje seguro</p>
			</header>
            <div>
					<table>
						<tr>
							<th>ID</th>
							
                            <th>DESTINO</th>
                            <th>FECHA</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>IMPORTE</th>
                            <th>DIA DE VENTA</th>
							<th>ENTREGADO</th>
						</tr>
							<?PHP
								include_once '../conexion.php';
								$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
								$consulta="SELECT V.Id,P.Nombre,V.Fecha,V.Cantidad,V.Precio,V.Importe,V.DomicilioEntrega,V.ConfirmarVenta FROM ventas as V INNER JOIN usuarios as U on V.IdUsuario=U.Id JOIN productos as P on v.IdProducto=P.Id WHERE IdUsuario=".$idUsuario;
								$resultado=$mysqlConexion->query($consulta);
								while($registro=$resultado->fetch_assoc())
								{									
									?>
									<tr>
										<td><?PHP echo $registro["Id"];?></td>
                                        <td><?PHP echo $registro["Nombre"];?></td>
                                        <td><?PHP echo $registro["Fecha"];?></td>
                                        <td><?PHP echo $registro["Cantidad"];?></td>
                                        <td><?PHP echo $registro["Precio"];?></td>
                                        <td><?PHP echo $registro["Importe"];?></td>
                                        <td><?PHP echo $registro["DomicilioEntrega"];?></td>
										<td><?PHP echo $registro["ConfirmarVenta"];?>	 </td>
									</tr>
									<?PHP
								}
								
							?>
					</table>
				</div>
		</div>
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