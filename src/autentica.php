<?php
$nome = $_POST['nome'];
$senha = $_POST['senha'];
session_start();
if("rafael" == $nome and "123" == $senha){
	
	$_SESSION['admin'] = "Rafael";
	echo "<script>window.location='admin.php'</script>";
}else{
	$_SESSION['error'] = "<p>Usuário ou senha incorretos</p>";
	unset($_SESSION['admin']);
	echo "<script>window.location='login.php'</script>";
}