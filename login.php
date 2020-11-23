<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>ZAGA.com</title>
</head>

    <body>
	<header id="header" >
	<h1><a href="index.php">ZAGA</a></h1>

	</header>
	
    <section id="main" class="wrapper">
		<div class="container">
            <form action="validarUsuario.php" method="post">
				<div>
					<img src="img/avatar.png" alt="avatar">
					</div>
					<label>USUARIO</label>
					<input type="text" name="usuario" placeholder="Captura tu usuario" required>
					<label >PASSWORD</label>
					<input type="password" name="password" placeholder="captura tu contraseña" required>
					<input type="submit" value="Enviar">
		    </form>					
		</div>
		<div class="container">
				<a href="registrar.php">Crear una cuenta</a><br>
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