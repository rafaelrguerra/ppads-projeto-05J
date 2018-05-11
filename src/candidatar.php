<!doctype html>
<html>
	<head>
		<title>Candidatar-se</title>
		<link rel="stylesheet" href="css/adicionarVagaStyle.css"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon" />		
	</head>
	<body>
		<div>
			<?php
			
			if(!isset($_POST['id_vaga'])){
				echo "<script>window.location='index.php'</script>";
				return;
			}else{
				$id_vaga = $_POST['id_vaga'];
				$nome_vaga = $_POST['nome_vaga'];
				include "conexao.php";
				$conn = getConnection();
				$sql = "SELECT DISTINCT alternativa.* from alternativa INNER JOIN teste_alternativa ON 
				alternativa.id_alternativa = teste_alternativa.id_alternativa WHERE
				teste_alternativa.id_teste = (SELECT id_teste FROM teste WHERE id_vaga = ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(1, $id_vaga);
				$stmt->execute();
				$result = $stmt->fetchAll();
				
				$sql2= "select * from teste where id_vaga = ?";
				$stmt2 = $conn->prepare($sql2);
				$stmt2->bindParam(1, $id_vaga);
				$stmt2->execute();
				$result2 = $stmt2->fetch();
				
				$sql3 = "SELECT DISTINCT checkbox.* from checkbox INNER JOIN teste_checkbox ON 
				checkbox.id_checkbox = teste_checkbox.id_checkbox WHERE
				teste_checkbox.id_teste = (SELECT id_teste FROM teste WHERE id_vaga = ?)";
				$stmt3 = $conn->prepare($sql3);
				$stmt3->bindParam(1, $id_vaga);
				$stmt3->execute();
				$result3 = $stmt3->fetchAll();
				
				$cont = 0;
				
				echo "<h1>".$result2['nome_teste'] . "</h1>";
				
				echo "<form action = 'upload.php' method='post' enctype='multipart/form-data'>";
				foreach ($result as $v){
					$cont = $cont + 1;

					echo $cont . "- " . $v['enunciado'] ."<br>". "<input type='radio' name='" . $cont . "' value='a'>" . $v['a'] . "<br>";
					echo "<input type='radio' name='" . $cont . "' value='b'>". $v['b'] ."<br>";
					echo "<input type='radio' name='" . $cont . "' value='c'>" . $v['c'] . "<br>";
					echo "<input type='radio' name='" . $cont . "' value='d'>". $v['d'] ."<br>";
					echo "<input type='radio' name='" . $cont . "' value='e'>". $v['e'] ."<br><br>";
					echo "<input type='hidden' name = '" . $cont . "correta" . "' value='" . $v['correta'] . "'>";
				}
				
				foreach($result3 as $v){
					$cont = $cont + 1;

					echo $cont . "- " . $v['enunciado'] ."<br>". "<input type='checkbox' name='" . $cont . "[]" . "' value='a'>" . $v['a'] . "<br>";
					echo "<input type='checkbox' name='" . $cont . "[]" . "' value='b'>". $v['b'] ."<br>";
					echo "<input type='checkbox' name='" . $cont . "[]" . "' value='c'>" . $v['c'] . "<br>";
					echo "<input type='checkbox' name='" . $cont . "[]" . "' value='d'>". $v['d'] ."<br>";
					echo "<input type='checkbox' name='" . $cont . "[]" . "' value='e'>". $v['e'] ."<br><br>";
					echo "<input type='hidden' name = '" . $cont . "corretas[]" . "' value='" . $v['corretas'] . "'>";
					
				}
				$conn = null;
			}
			?>
			
			
			
				<h2>E-mail</h2><input type="email" placeholder="Digite seu e-mail para contato" required name="email"><br><br>
				<input type="file" required name="arquivo">
				
				<input type="hidden" name="cont" value="<?php echo $cont; ?>"/>
				<input type="hidden" name="contAlternativa" value="<?php echo $contAlternativa; ?>"/>
				<input type="hidden" name="contCheckbox" value="<?php echo $contCheckbox; ?>"/>
				
				<input type="hidden" name="id_vaga" value="<?php echo htmlspecialchars($id_vaga) ?>"><br><br>
				<input type="hidden" name="nome_vaga" value="<?php echo htmlspecialchars($nome_vaga) ?>">
				
				<input type="submit" value="Salvar">
			</form>
		</div>
	</body>
</html>