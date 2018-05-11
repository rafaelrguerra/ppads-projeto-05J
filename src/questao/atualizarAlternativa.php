<!doctype html>
<html>
	<head>
		<title>Atualizar alternativa</title>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon" />
	</head>
	<body>
		<div>
			<h1>Atualizar alternativa</h1>
			<?php
			
			session_start();
			if (!isset($_SESSION['admin'])){
				echo "<script>window.location='login.php'</script>";
				return;
			
			}
			$id_alternativa = $_POST['alternativa'];
			if($id_alternativa == 0){
				echo "<script>window.location='atualizarQuestao.php'</script>";
				return;
			}
			
			include "../conexao.php";
			$conn = getConnection();
			$sql = "SELECT * FROM alternativa WHERE id_alternativa=?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $id_alternativa);
			$stmt->execute();
			$result = $stmt->fetch();
			
			$enunciado = $result['enunciado'];
			
			
			?>
				
				
			<form method='post' action='atualizarAlternativa2.php'>
				Enunciado <input type='text' name='enunciado' value="<?php echo $enunciado; ?>" required><br/><br/>
				Alternativa A <input type='text' name='a' value="<?php echo $result['a'] ?>" required /><br/><br/>
				Alternativa B <input type='text' name='b' value="<?php echo $result['b'] ?>" required /><br/><br/>
				Alternativa C <input type='text' name='c' value="<?php echo $result['c'] ?>" required /><br/><br/>
				Alternativa D <input type='text' name='d' value="<?php echo $result['d'] ?>" required /><br/><br/>
				Alternativa E <input type='text' name='e' value="<?php echo $result['e'] ?>" required /><br/><br/>
						
				Qual é a correta?<br><input type='radio' name='correta' value='a' required>A<br>
				<input type='radio' name='correta' value='b'>B<br>
				<input type='radio' name='correta' value='c'>C<br>
				<input type='radio' name='correta' value='d'>D<br>
				<input type='radio' name='correta' value='e'>E<br><br>
				
				<input type="hidden" name="id_alternativa" value="<?php echo $id_alternativa; ?>"/>
				<input type='submit' value='Próximo'/>
			</form>
			
			<br><br><a href='atualizarQuestao.php'>Voltar</a>
			<?php $conn = null; ?>
		</div>
	</body>
</html>