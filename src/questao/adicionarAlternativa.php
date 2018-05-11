<?php

session_start();
if (!isset($_SESSION['admin'])){
	echo "<script>window.location='login.php'</script>";
	return;
		
}

include "../conexao.php";


$conn = getConnection();
$enunciado = $_POST['enunciado'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$correta = $_POST['correta'];

$sql = "INSERT INTO alternativa (enunciado,a, b,c,d,e,correta) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $enunciado);
$stmt->bindParam(2, $a);
$stmt->bindParam(3, $b);
$stmt->bindParam(4, $c);
$stmt->bindParam(5, $d);
$stmt->bindParam(6, $e);
$stmt->bindParam(7, $correta);

if($stmt->execute()){	
	$_SESSION['error'] = "<p class='noError'>Questão adicionada com sucesso</p>";
	
}else{
	$_SESSION['error']="<p class='error'>Erro ao adicionar questão</p>";
}


$conn = null;
echo "<script>window.location='adicionarQuestao.php'</script>";