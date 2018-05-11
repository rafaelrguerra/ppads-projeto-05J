<!doctype html>
<html>
	<head>
		<title>Página do administrador</title>
		<link rel="stylesheet" href="css/adminStyle.css"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon" />
	</head>
	<body>
		
			<h2>
				<?php
				session_start();
				if (isset($_SESSION['admin'])){
					echo "Bem-vindo, " . $_SESSION['admin'];
				}else{
					echo "<script>window.location='login.php'</script>";
					return;
				}
				?>
				
				<a href="logout.php">SAIR</a>
				<a href="index.php">PÁGINA PRINCIPAL</a>
			</h2>
		
		
			<h1>Gerenciar vagas</h1>
			<p><a href="atualizarVaga.php">Atualizar uma vaga</a></p>
			<p><a href="excluirVaga.php">Excluir uma vaga</a></p>
			<p><a href="adicionarVaga.php">Adicionar uma vaga</a></p>
		
		
			<h1>Gerenciar questões</h1>
			<p><a href="questao/atualizarQuestao.php">Atualizar questão</a></p>
			<p><a href="questao/excluirQuestao.php">Excluir questão</a></p>
			<p><a href="questao/adicionarQuestao.php">Adicionar questão</a></p>		
		
			<h1>Gerenciar testes</h1>
			<p><a href="teste/excluirTeste.php">Excluir teste</a></p>
			<p><a href="teste/adicionarTeste.php">Adicionar teste</a></p>
			
	</body>
</html>