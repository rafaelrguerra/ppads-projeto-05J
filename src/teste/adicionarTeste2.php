<?php

session_start();
if (!isset($_SESSION['admin'])){
	echo "<script>window.location='login.php'</script>";
	return;
}

include "../conexao.php";
$conn = getConnection();

$nome_teste = $_POST['nome_teste'];
$vaga = $_POST['vaga'];

$alternativas = $_POST['alternativa'];
$checkboxes = $_POST['checkbox'];

$sql = "INSERT INTO teste (nome_teste, id_vaga) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $nome_teste);
$stmt->bindParam(2, $vaga);
if($stmt->execute()){
	$_SESSION['error'] = "<p class='noError'>Teste adicionado com sucesso.</p>";
}else{
	$_SESSION['error'] = "<p class='error'>Erro ao adicionar teste.</p>";
}

$sql3 = "SELECT id_teste FROM teste order by id_teste desc limit 1;";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$result = $stmt3->fetch();
$id_teste = $result['id_teste'];

foreach ($alternativas as $v){
	$sql2 = "INSERT INTO teste_alternativa (id_teste, id_alternativa) VALUES (?, ?)";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bindParam(1, $id_teste);
	$stmt2->bindParam(2, $v);
	$stmt2->execute();
}

foreach ($checkboxes as $v){
	$sql4 = "INSERT INTO teste_checkbox (id_teste, id_checkbox) VALUES (?, ?)";
	$stmt4 = $conn->prepare($sql4);
	$stmt4->bindParam(1, $id_teste);
	$stmt4->bindParam(2, $v);
	$stmt4->execute();

}
$conn = null;

echo "<script>window.location='adicionarTeste.php'</script>";
