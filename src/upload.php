<html>
    <head>

    </head>
    <body>
        <?php
        include 'conexao.php';
        $conn = getConnection();
        $msg = false;
		
        if (isset($_FILES['arquivo'])) {
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
            $novoNome = md5(time()) . $extensao;
            $diretorio = "upload/";
            $email = $_POST['email'];
            $id_vaga = $_POST['id_vaga'];
			$cont = $_POST['cont'];
			$contAcertos = 0;
			
			
			for ($i = 1; $i <= $cont; $i++) {
				if(isset($_POST[$i . "correta"])){
					if(isset($_POST[$i])){
						if($_POST[$i] == $_POST[$i . "correta"]){
							$contAcertos = $contAcertos + 1;
							
						}
					}
				}else{
					if(isset($_POST[$i . "corretas"])){
						
						
						if(isset($_POST[$i])){
							$strSelecionadas = "";
							$strCorretas = "";
							foreach ($_POST[$i] as $v ){
								$strSelecionadas = $strSelecionadas . $v;
							}
							
							
							foreach($_POST[$i . "corretas"] as $v){
								$strCorretas = $strCorretas . $v;
							}
							
							if($strSelecionadas == $strCorretas){
								$contAcertos = $contAcertos + 1;
								
							}
						}
					}
				}
			}
			$nota = ($contAcertos/$cont) * 10;
			if(is_nan($nota)){
			    $nota = 99;
			}
			
            $sql = "INSERT into arquivo (id_arquivo, arquivo, id_vaga, email_candidato, data, nota) values (null, '$novoNome','$id_vaga', '$email', NOW(), $nota)";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute()) {
				move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novoNome); 
                $msg = 'Arquivo enviado com sucesso.';
				
				$nome_vaga = $_POST['nome_vaga'];
				
				require_once('PHPMailer/PHPMailerAutoload.php');

                if($nota = 99){
                    $nota = "indisponível";
                }
                
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'tls';
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->isHTML();
				$mail->Username = 'sistemacontratacaoipioca@gmail.com';
				$mail->Password = 'sistemacontratacao';
				$mail->SetFrom('no-reply@howcode.org');
				
				$mail->Subject = 'Candidato para '. $nome_vaga;
				
				$mail->Body = 'Novo candidato para a vaga: ' . $nome_vaga . "<br>E-mail: " . $email . "<br>Nota no teste: " . $nota;
				
				$mail->AddAddress('sistemacontratacaoipioca@gmail.com');

				$mail->Send();
				
            } else {
                $msg = 'Falha ao enviar o arquivo.';
            }
        }

        echo $msg . "<br>";
        ?>
        <script>
            window.setTimeout(function () {

                window.location.href = "vaga.php?id_vaga=<?php echo $_POST['id_vaga']; ?>";

            }, 5000);
        </script>
		<?php
		$conn = null;
		?>
    </body>

</html>



