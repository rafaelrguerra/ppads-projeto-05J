<!doctype html>
<html>
	<head>
		<title>Atualizar questão</title>
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
			<h1>Atualizar questão alternativa</h1>
			<form method="post" action="atualizarAlternativa.php">
				<select name="alternativa" required>
					<option value=0 disabled selected>Selecione</option>
					<?php
					include "../conexao.php";
					$conn = getConnection();
					$sql = "SELECT * FROM alternativa";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					foreach ($result as $value){
						echo "<option value='" . $value['id_alternativa'] . "'>";
						echo $value['enunciado'] . "</option>";
					}
					?>

				</select>
				<input type="submit" value="Próximo" />
			</form>
			
			<h1>Atualizar questão checkbox</h1>
			<form method='post' action='atualizarCheckbox.php'>
				<select name="checkbox" required>
					<option value=0 disabled selected>Selecione</option>
					<?php
					
					$sql = "SELECT * FROM checkbox";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					foreach ($result as $value){
						echo "<option value='" . $value['id_checkbox'] . "'>";
						echo $value['enunciado'] . "</option>";
					}
					?>

				</select>
				<input type="submit" value="Próximo" />
			</form>
			
					
			<?php
			
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			$conn = null;
			?>
			<br><a href='../admin.php'>Voltar</a>
		</div>

		
		
	</body>
</html>