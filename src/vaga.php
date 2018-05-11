<html>
    <head>
        <title>Vaga</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="icone.png" type="image/x-icon" />
    </head>
    <body>
        <table id='myTable'>
            <tr>
                <td>
                    <center><h2>VAGA</h2></center>
                    <?php
                    include 'conexao.php';
                    $conn = getConnection();
            
                    $sql = "select * from vaga where id_vaga= ?";
            
                    $id_vaga = $_GET['id_vaga'];
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(1, $id_vaga);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
					$nome_vaga = "";
                    foreach ($result as $value) {
                        echo '<h1>';
						$nome_vaga = $value['nome_vaga'];
                        echo $value['nome_vaga'];
                        echo '</h1>';
                        echo '<h2> Salário: ';
                        echo 'R$' . number_format($value['salario_vaga'], 2, ',', '.');
                        echo '</h2> <h3>Descrição da vaga: </h3><p>';
                        echo $value['descricao_vaga'];
                        echo '</p><h3>Requisitos para a vaga</h3><p>';
                        echo $value['requisitos_vaga'];
                        echo '</p>';
                    }
                    ?>  
                </td>
            </tr>
            <tr>
                <td>
				
					<?php
					session_start();
					if(isset($_SESSION['admin'])){
						echo "<h2>Candidatos</h2>";
						
						$sql2 = "SELECT * FROM arquivo WHERE id_vaga=?";
						$stmt2 = $conn->prepare($sql2);
						
						$stmt2->bindParam(1, $id_vaga);
						$stmt2->execute();
						$result2 = $stmt2->fetchAll();
						
						if(!empty($result2)){
							echo "<table>";
							echo "<tr>";
							echo "<th>E-mail</th>";
							echo "<th>Data de inscrição</th>";
							echo "<th>Nota</th>";
							echo "</tr>";

							foreach($result2 as $v){
								echo "<tr>";
								echo "<td>" . $v['email_candidato'] . "</td>";
								echo "<td>" . $v['data'] . "</td>";
								echo "<td>" . $v['nota'] . "</td>";
								echo "</tr>";
							}
							
							echo "</table>";
						}else{
							echo "<p>Sem candidatos para esta vaga.</p>";
						}
					}else{
						echo "<h2>Candidatar-se</h2>";
						echo "<p>Para se candidatar à vaga, realize um teste (se houver) e envie seu currículo.</p>";
						echo "<form method='post' action='candidatar.php'>";
						echo "<input type='hidden' name='id_vaga' value='$id_vaga'/>";
						echo "<input type='hidden' name='nome_vaga' value='$nome_vaga'/>";
						echo "<input type='submit' value='Clique aqui para começar'/>";
						echo "</form>";
					}	
					$conn = null;
					
					?>
                    <a href="index.php">↶ Voltar para lista de vagas</a>
                </td>
            </tr>
        </table>
    </body>

</html>



