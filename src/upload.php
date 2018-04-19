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


            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novoNome); 

            $sql = "INSERT into arquivo (id_arquivo, arquivo, id_vaga, email_candidato, data) values (null, '$novoNome','$id_vaga' , '$email', NOW())";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute()) {
                $msg = 'Arquivo enviado com sucesso.';
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



