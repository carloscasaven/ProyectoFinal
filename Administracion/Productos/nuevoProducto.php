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
    <link rel="stylesheet" href="../../css/style.css" />
    <title>ZAGA</title>
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
            </header>
            <div>
                <form action="guardarProducto.php" method="post">
                    <div class="container">
                        <label> Nombre:</label>
                        <input type="text" name="nombre" required placeholder="nombre">
                        <label>Tipo:</label>
                        <select name="tipo">
                            <option value="0">Seleccione:</option>
                            <?php
                            // Realizamos la consulta para extraer los datos
                            include_once '../../conexion.php';
                            $mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
                            $consulta="SELECT * FROM tipoproductos";
                            $resultado=$mysqlConexion->query($consulta);
                            while ($valores = mysqli_fetch_array($resultado)) {
                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores['Id'].'">'.$valores['Descripcion'].'</option>';
                            }
                            ?>
                        </select>
                        <label>Precio:</label>
                        <input type="text" name="precio" required placeholder="precio">
                        <label>Existencia:</label>
                        <input type="text" name="existencia" required placeholder="existencia">
                        <br>
                        <button type="submit">Guardar</button>
                    </div>
                </form>
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