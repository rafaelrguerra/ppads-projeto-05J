<!doctype html>
<html>
	<head>
		<title>Adicionar vaga</title>
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
		
		if ($_GET['id_vaga'] == 0){
			echo "<script>window.location='atualizarVaga.php'</script>";
		}else{
			include "conexao.php";
			$conn = getConnection();
			$sql = "select * from vaga where id_vaga=? LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $_GET['id_vaga']);
			$stmt->execute();
			
			$result = $stmt->fetch();
			
			$id_vaga = $result['id_vaga'];
			$nome_vaga = $result['nome_vaga'];
			$salario_vaga = $result['salario_vaga'];
			$descricao_vaga = $result['descricao_vaga'];
			$requisitos_vaga = $result['requisitos_vaga'];
		}
		?>
		<div>
			<h1>Atualizar vaga</h1>
			<form method="post" action="crud.php">
				Título da vaga <input type="text" name="nome_vaga" value="<?php echo $nome_vaga; ?>" required /><br><br>
				Salário <input type="number" name="salario_vaga" value="<?php echo $salario_vaga; ?>" /><br>
				<p>Descrição da vaga</p><textarea rows="4" cols="50" name="descricao_vaga" placeholder="Descreva a vaga..."><?php echo $descricao_vaga; ?></textarea>
				<p>Requisitos da vaga</p><textarea rows="4" cols="50" name="requisitos_vaga" placeholder="Requisitos para a vaga..."><?php echo $requisitos_vaga; ?></textarea>			
				<br><br>
				<input type="hidden" name="id_vaga" value="<?php echo $id_vaga ?>"/>
				<input type="hidden" name="crud" value="update"/>
				<input type="submit" value="Atualizar vaga"/>
				
			</form>
			
			<a href="atualizarVaga.php">Voltar</a>
		</div>
		
		<?php $conn = null; ?>
		
	</body>
</html>