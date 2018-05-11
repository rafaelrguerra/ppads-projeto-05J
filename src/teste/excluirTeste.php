<!doctype html>
<html>
	<head>
		<title>Excluir teste</title>
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
		<h1>Excluir um teste</h1>
		
			<form method='post' action='excluirTeste2.php'>
				Selecione o teste que deseja excluir
				<select name="id_teste">
					<option value='0' selected>Selecione</option>
					<?php
					include "../conexao.php";
					$conn = getConnection();
					$sql = "select * from teste";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					foreach ($result as $v){
						echo "<option value='" . $v['id_teste'] . "'>";
						echo $v['nome_teste'] . "</option>";
					}
					?>
					<br>
					<input type='submit' value='Excluir' />
				</select>
			
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