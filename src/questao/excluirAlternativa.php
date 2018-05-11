<?php

session_start();
if (!isset($_SESSION['admin'])){
	echo "<script>window.location='login.php'</script>";
	return;
		
}

include "../conexao.php";
$conn = getConnection();

$id_alternativa = $_POST['id_alternativa'];


$sql = "DELETE FROM alternativa WHERE id_alternativa=?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_alternativa);
if($stmt->execute() and $id_alternativa != 0){
	$_SESSION['error'] = "<p class='noError'>Questão excluída com sucesso</p>";
}else{
	$_SESSION['error'] = "<p class='error'>Erro ao excluir a questão</p>";
}
$conn = null;
echo "<script>window.location='excluirQuestao.php'</script>";
