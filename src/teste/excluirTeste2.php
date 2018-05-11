<?php
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script>window.location='login.php'</script>";
	return;				
}



$id_teste = $_POST['id_teste'];
if($id_teste != 0){
	include "../conexao.php";
	$conn = getConnection();
	
	$sql = "DELETE FROM teste WHERE id_teste=?";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $id_teste);
	if($stmt->execute()){
		$_SESSION['error'] = "<p class='noError'>Teste excluído com sucesso.</p>";
	}else{
		$_SESSION['error'] = "<p class='error'>Erro ao excluir teste.</p>";
	}
	$conn = null;
	echo "<script>window.location='excluirTeste.php'</script>";
}else{
	$_SESSION['error'] = "<p class='error'>Erro ao excluir teste.</p>";
	echo "<script>window.location='excluirTeste.php'</script>";
}