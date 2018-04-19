<!doctype html>
<html>
	<head>
		<title>Excluir uma vaga</title>
		<link rel="stylesheet" href="css/adicionarVagaStyle.css"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon" />
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
			<h1>Excluir vaga</h1>
			<form method="post" action="crud.php">
				Selecione a vaga:
				<select name="id_vaga">
					<option value=0>Selecione</option>
					<?php
					include 'conexao.php';
					$conn = getConnection();
					$sql = "SELECT * FROM vaga;";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					foreach ($result as $value){
						echo "<option value='" . $value['id_vaga'] . "'>";
						echo $value['nome_vaga'] . "</option>";
					}
					?>
				</select>
				
				<input type="hidden" name="crud" value="delete"/>
				<input type="submit" value="Excluir"/>
				
				
			</form>
			
			<?php
			
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}	

			?>
			<br/>
			<a href="admin.php">Voltar</a>
		</div>
		
		<br>
		
	</body>
</html>