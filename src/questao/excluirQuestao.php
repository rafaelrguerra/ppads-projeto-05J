<!doctype html>
<html>
	<head>
		<title>Excluir questão</title>
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
		
		include '../conexao.php';
		$conn = getConnection();		
		?>
	
		<div>
			<h1>Excluir questão alternativa</h1>
			<form method="post" action="excluirAlternativa.php">
				Selecione a questão de alternativa
				<select name="id_alternativa">
					<option value=0>Selecione</option>
					<?php

					$sql = "SELECT * FROM alternativa;";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					foreach ($result as $value){
						echo "<option value='" . $value['id_alternativa'] . "'>";
						echo $value['enunciado'] . "</option>";
					}
					?>
				</select>
				
				<input type="hidden" name="crudQuestoes" value="delete"/>
				<input type="submit" value="Excluir"/>
				
				
				
			</form>

			<h1>Excluir questão checkbox</h1>
			<form method="post" action="excluirCheckbox.php">
				Selecione a questão de checkbox
				<select name="id_checkbox">
					<option value=0>Selecione</option>
					<?php
				
					$sql = "SELECT * FROM checkbox;";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					foreach ($result as $value){
						echo "<option value='" . $value['id_checkbox'] . "'>";
						echo $value['enunciado'] . "</option>";
					}
					?>
				</select>
				
				<input type="hidden" name="crudQuestoes" value="delete"/>
				<input type="submit" value="Excluir"/>
				
				
				
			</form>			
			<?php
			
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			$conn = null;
			?>
			<a href='../admin.php'>Voltar</a>

		</div>
	</body>
</html>