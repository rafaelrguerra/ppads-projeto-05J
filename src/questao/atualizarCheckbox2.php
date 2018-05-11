<?php
session_start();
$id_alternativa = $_POST['id_checkbox'];
$id_checkbox = $_POST['id_checkbox'];
$enunciado = $_POST['enunciado'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$corretas = $_POST['correta'];
$strCorretas = "";
foreach ($corretas as $v){
	$strCorretas = $strCorretas . $v;
}

include "../conexao.php";
$conn = getConnection();
$sql = "UPDATE checkbox SET enunciado=?, a=?, b=?, c=?, d=?, e=?, corretas=? WHERE id_checkbox=?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $enunciado);
$stmt->bindParam(2, $a);
$stmt->bindParam(3, $b);
$stmt->bindParam(4, $c);
$stmt->bindParam(5, $d);
$stmt->bindParam(6, $e);
$stmt->bindParam(7, $strCorretas);
$stmt->bindParam(8, $id_checkbox);
		
if($stmt->execute()){
	$_SESSION['error'] = "<p class='noError'>Questão atualizada com sucesso</p>";
}else{
	$_SESSION['error'] = "<p class='error'>Erro ao atualizar a questão</p>";
			
}
$conn = null;
echo "<script>window.location='atualizarQuestao.php'</script>";
