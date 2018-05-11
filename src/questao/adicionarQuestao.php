<!doctype html>
<html>
	<head>
		<title>Adicionar questão</title>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="../icone.png" type="image/x-icon" />
	</head>
	<body>
		<?php
		session_start();
		if (!isset($_SESSION['admin'])){
			echo "<script>window.location='login.php'</script>";
			return;
		}
		?>
		<div>
		<h1>Adicionar questão parte 1</h1>
			<form method="post" action="adicionarQuestao2.php">
				<select name="tipoQuestao" required>
					<option value="0" selected>Selecione</option>
					<option value="alternativa">Alternativa</option>
					<option value="check">Checkbox</option>

				</select>
				<input type="submit" value="Próximo"/>
			</form>
			
			<?php
		
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			?>
			<br><a href='../admin.php'>Voltar</a>
		</div>

		
		
	</body>
</html>