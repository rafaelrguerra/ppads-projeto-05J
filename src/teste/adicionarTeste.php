<!doctype html>
<html>
	<head>
		<title>Adicionar teste</title>
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
			<h1>Adicionar um teste</h1>
			<form method="post" action="adicionarTeste2.php">
				Título <input type="text" name="nome_teste" placeholder="Adicione um título"/>
			
				<h3>Selecione a vaga</h3>
				<?php
				include "../conexao.php";
				$conn = getConnection();
				$sql = "SELECT * FROM vaga";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll();
				
				foreach ($result as $v){
					echo "<input type='radio' name='vaga' value='" . $v['id_vaga'] . "' required />";
					echo $v['nome_vaga'] . "<br>";
				}
				
				?>
				
				<h3>Selecione as questões de alternativa</h3>
				<?php
				$sql2 = "SELECT * FROM alternativa";
				$stmt2 = $conn->prepare($sql2);
				$stmt2->execute();
				$result = $stmt2->fetchAll();
				
				foreach ($result as $v){
					echo "<input type='checkbox' name='alternativa[]' value='" . $v['id_alternativa'] . "'  />";
					echo $v['enunciado'] . "<br>";
				}
				
				
				?>
				
				
				<h3>Selecione as questões de checkbox</h3>
				<?php
				$sql3 = "SELECT * FROM checkbox";
				$stmt3 = $conn->prepare($sql3);
				$stmt3->execute();
				$result = $stmt3->fetchAll();
				
				foreach ($result as $v){
					echo "<input type='checkbox' name='checkbox[]' value='" . $v['id_checkbox'] . "'>";
					echo $v['enunciado'] . "<br>";				
				}
				?>
				
				
				<br><input type="submit" value="Adicionar teste"/>
			</form><br>
			
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