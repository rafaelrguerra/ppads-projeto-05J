<!doctype html>
<html>
	<head>
		<title>Adicionar questionário</title>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="../icone.png" type="image/x-icon" />
	</head>
	<body>
		<div>
		<h1>Adicionar questão parte 2</h1>
		<?php
		
		session_start();
		if (!isset($_SESSION['admin'])){
			echo "<script>window.location='login.php'</script>";
			return;
		}

		
			$tipo = $_POST['tipoQuestao'];
			if ($tipo == "alternativa"){
				echo "<form method='post' action='adicionarAlternativa.php'>";
				echo "Enunciado <input type='text' name='enunciado' required><br/><br/>";
				echo "Alternativa A <input type='text' name='a' required><br/><br/>";
				echo "Alternativa B <input type='text' name='b' required><br/><br/>";
				echo "Alternativa C <input type='text' name='c' required><br/><br/>";
				echo "Alternativa D <input type='text' name='d' required><br/><br/>";
				echo "Alternativa E <input type='text' name='e' required><br/><br/>";
				
				echo "Qual é a correta?<br>	<input type='radio' name='correta' value='a' required>A<br>";
				echo "<input type='radio' name='correta' value='b'>B<br>";
				echo "<input type='radio' name='correta' value='c'>C<br>";
				echo "<input type='radio' name='correta' value='d'>D<br>";
				echo "<input type='radio' name='correta' value='e'>E<br><br>";
				
				echo "<input type='submit' value='Próximo'></form>";
				
			}else if ($tipo == "check"){
				echo "<form method='post' action='adicionarCheckbox.php'>";
				echo "Enunciado <input type='text' name='enunciado' required><br/><br/>";
				echo "Alternativa A <input type='text' name='a' required><br/><br/>";
				echo "Alternativa B <input type='text' name='b' required><br/><br/>";
				echo "Alternativa C <input type='text' name='c' required><br/><br/>";
				echo "Alternativa D <input type='text' name='d' required><br/><br/>";
				echo "Alternativa E <input type='text' name='e' required><br/><br/>";				
				
				echo "Qual(is) é(são) a(s) correta(s)?<br>	<input class='checar' type='checkbox' name='correta[]' value='a'>A<br>";
				echo "<input class='checar' type='checkbox' name='correta[]' value='b'>B<br>";
				echo "<input class='checar' type='checkbox' name='correta[]' value='c'>C<br>";
				echo "<input class='checar' type='checkbox' name='correta[]' value='d'>D<br>";
				echo "<input class='checar' type='checkbox' name='correta[]' value='e'>E<br><br>";
				
				echo "<input type='submit' value='Próximo'></form>";
				
			}else{
				echo "<script>window.location='adicionarQuestao.php'</script>";
			}
		?>
		<br><br><a href='adicionarQuestao.php'>Voltar</a>
		</div>
	</body>
</html>