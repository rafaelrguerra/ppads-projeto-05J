<?php
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script>window.location='../login.php'</script>";
	return;
		
}
$id_alternativa = $_POST['id_alternativa'];
$enunciado = $_POST['enunciado'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$correta = $_POST['correta'];

include "../conexao.php";
$conn = getConnection();
$sql = "UPDATE alternativa SET enunciado=?, a=?, b=?, c=?, d=?, e=?, correta=? WHERE id_alternativa=?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $enunciado);
$stmt->bindParam(2, $a);
$stmt->bindParam(3, $b);
$stmt->bindParam(4, $c);
$stmt->bindParam(5, $d);
$stmt->bindParam(6, $e);
$stmt->bindParam(7, $correta);
$stmt->bindParam(8, $id_alternativa);
		
if($stmt->execute()){
	$_SESSION['error'] = "<p class='noError'>Questão atualizada com sucesso</p>";
}else{
	$_SESSION['error'] = "<p class='error'>Erro ao atualizar a questão</p>";
			
}
$conn = null;
echo "<script>window.location='atualizarQuestao.php'</script>";
