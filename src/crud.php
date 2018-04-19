<?php
include 'conexao.php';
$conn = getConnection();
$crud = $_POST['crud'];
session_start();
if($crud == "create"){
	$nome_vaga = $_POST['nome_vaga'];
	$salario_vaga = $_POST['salario_vaga'];
	$descricao_vaga = $_POST['descricao_vaga'];
	$requisitos_vaga = $_POST['requisitos_vaga'];
	
	if($salario_vaga == null or $salario_vaga > 0 ){
		$sql = "INSERT INTO vaga (nome_vaga, salario_vaga, descricao_vaga, requisitos_vaga) VALUES (?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $nome_vaga);
		$stmt->bindParam(2, $salario_vaga);
		$stmt->bindParam(3, $descricao_vaga);
		$stmt->bindParam(4, $requisitos_vaga);
		
		if($stmt->execute()){	
			$_SESSION['error']="<p class='noError'>Vaga adicionada com sucesso</p>";			
		}else{
			$_SESSION['error']="<p class='error'>Erro ao adicionar vaga</p>";
		}
		
		$conn = null;
		echo "<script>window.location='adicionarVaga.php'</script>";
		
	}else{
		$conn = null;
		$_SESSION['error']="<p class='error'>Salário precisa ser um número positivo</p>";
		echo "<script>window.location='adicionarVaga.php'</script>";
	}
	
	
	
	
	
}else if($crud == "update"){
	$id_vaga = $_POST['id_vaga'];
	$nome_vaga = $_POST['nome_vaga'];
	$salario_vaga = $_POST['salario_vaga'];
	$descricao_vaga = $_POST['descricao_vaga'];
	$requisitos_vaga = $_POST['requisitos_vaga'];
	
	if (($salario_vaga == null or $salario_vaga > 0) and $id_vaga != 0){
		$sql = "UPDATE vaga set nome_vaga = ?, salario_vaga = ?, descricao_vaga = ?, requisitos_vaga = ? where id_vaga = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $nome_vaga);
		$stmt->bindParam(2, $salario_vaga);
		$stmt->bindParam(3, $descricao_vaga);
		$stmt->bindParam(4, $requisitos_vaga);
		$stmt->bindParam(5, $id_vaga);
		
		if($stmt->execute()){
			$_SESSION['error'] = "<p class='noError'>Vaga atualizada com sucesso</p>";
		}else{
			$_SESSION['error'] = "<p class='error'>Erro ao atualizar a vaga</p>";
			
		}	
		$conn = null;
		echo "<script>window.location='atualizarVaga.php'</script>";
	}else{
		$conn = null;
		$_SESSION['error'] = "<p class='error'>Erro ao atualizar a vaga</p>";
		echo "<script>window.location='atualizarVaga.php'</script>";
	}
	
}else{
	$id_vaga = $_POST['id_vaga'];
	$sql = "DELETE FROM vaga WHERE id_vaga=?";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $id_vaga);
	if($stmt->execute() and $id_vaga != 0){
		$_SESSION['error'] = "<p class='noError'>Vaga excluída com sucesso</p>";
	}else{
		$_SESSION['error'] = "<p class='error'>Erro ao excluir a vaga</p>";
	}
	$conn = null;
	echo "<script>window.location='excluirVaga.php'</script>";
}










