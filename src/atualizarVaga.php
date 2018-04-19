<!doctype html>
<html>
	<head>
		<title>Atualizar uma vaga</title>
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
			<h1>Atualizar vaga</h1>
			<form method="get" action="atualizarVaga2.php">
				Selecione a vaga a ser atualizada
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
					$conn = null;
					?>
				</select><br/><br/>

			
				
				<input type="submit" value="Atualizar vaga"/>
				
				
			</form>
			
			
				<?php
				if(isset($_SESSION['error'])){
					echo $_SESSION['error'];
					unset($_SESSION['error']);
				}				
				?>
			
			<a href="admin.php">Voltar</a>
		</div>

		
		
	</body>
</html>