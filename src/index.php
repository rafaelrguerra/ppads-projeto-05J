<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Trabalho PPADS</title>  
      <link rel="stylesheet" href="css/style.css"/>
      <link rel="shortcut icon" href="icone.png" type="image/x-icon" />
</head>

<body>
  <center>
    
		<h1>SISTEMA DE CONTRATAÇÃO - iPIOCA</h1><h2><a class="adm" href = 'admin.php'>PÁGINA DO ADMINISTRADOR</a></h2>
	
    <h2>Vagas Disponíveis</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por vagas..." title="Type in a name">

    <table id="myTable">
      <tr class="header">
        <th style="width:50%;">VAGA</th>
        <th style="width:35%;">SALÁRIO</th>
      </tr>

      <?php
        include 'conexao.php';
        $conn = getConnection();
        $sql = "select * from vaga";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $value) {

            echo "<tr>";
            echo "<td>";
            echo "<a style='text-decoration:none;color:black;'class='testezinho' href='vaga.php?id_vaga=".$value['id_vaga']."'><div>";
            echo $value['nome_vaga'];
            echo "";
            echo "</td><td>";
            echo 'R$' . number_format($value['salario_vaga'], 2, ',', '.');
            echo "</td></div>";
            
            echo "</tr>";
        }
        $conn = null;
      ?>

    </table>
  </center>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

  
  <script  src="js/index.js"></script>



</body>

</html>
