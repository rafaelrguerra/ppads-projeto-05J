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
            
                    foreach ($result as $value) {
                        echo '<h1>';
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
                    <h2>Candidatar-se</h2>
                    <p>Para se candidatar à vaga, envie seu currículo.</p>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        E-mail: <input type="email" required name="email"><br><br>
                        <input type="file" required name="arquivo">
                        <input type="hidden" name="id_vaga" value="<?php echo htmlspecialchars($id_vaga) ?>"><br><br>
                        <input type="submit" value="Salvar">
                    </form>
                    <?php
                        $conn = null;
                    ?>
                    <a href="index.php">↶ Voltar para lista de vagas</a>
                </td>
            </tr>
        </table>
    </body>

</html>



