<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Deletar Curso</title>
    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/cursos.css";
    </style>
</head>

<body>
  <?php
    $cod_del = $_POST['cod_del'];
    $nome = $_POST['nome'];
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $result=mysqli_query($ok, "delete from cursos where codigo='$cod_del'") 
    or die ("Não é possível excluir este curso!");
    echo "<script>alert('$nome deletado com sucesso!')</script>";

  ?>
    <section id="backNav">
      <a href="../index.php">
        <div id="backButton">
          <img src="../images/back.png" id="backIcon">
        </div>

        <div id="backText">
          Voltar para home
        </div>
      </a>
    </section>
</body>
</html>





