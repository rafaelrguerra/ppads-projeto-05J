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
		?>
		<div>
			<h1>Adicionar vaga</h1>
			<form method="post" action="crud.php">
				Título da vaga <input type="text" name="nome_vaga" required /><br><br>
				Salário <input type="number" name="salario_vaga"/><br>
				<p>Descrição da vaga</p><textarea rows="4" cols="50" name="descricao_vaga"  placeholder="Descreva a vaga..."></textarea>
				<p>Requisitos da vaga</p><textarea rows="4" cols="50" name="requisitos_vaga" placeholder="Requisitos para a vaga..."></textarea>			
				<br><br>
				<input type="hidden" name="crud" value="create"/>
				<input type="submit" value="Adicionar nova vaga"/>
				
			</form>
			
			
				<?php
				if(isset($_SESSION['error'])){
					echo $_SESSION['error'];
					unset($_SESSION['error']);
					echo "<br/>";
				}
				?>
			
			
			<a href="admin.php">Voltar</a>
		</div>
		
		<br>
		
	</body>
</html>