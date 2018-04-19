<!doctype html>
<html>
	<head>
		<title>Login do Administrador</title>
		<link rel="stylesheet" href="css/loginStyle.css"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon" />
	</head>
	<body>
		
		<div>
			<h1><a href="index.php">LOGIN DO ADMINISTRADOR</a></h1>
			<form action="autentica.php" method="post">
				Nome <input type="text" name="nome"/><br/><br/>
				Senha <input type="password" name="senha"/><br/><br/>
				<?php
				session_start();
				if(isset($_SESSION['error'])){
					echo $_SESSION['error'];
					unset($_SESSION['error']);
				}
				?>
				
				<input type="submit" value="Entrar" />
			</form>
		</div>
		
	</body>
</html>