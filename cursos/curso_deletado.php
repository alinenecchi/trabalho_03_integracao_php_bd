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

    <div id="header">
      <h1>Confirmação exclusão de Curso</h1>
      <h3>Alanda | Aline Cruz | Aline Dias | Bruna Rossoni</h3>
    </div>

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

    <section id="backNav">
      <a href="lista_curso.php">
        <div id="backButton">
          <img src="../images/back.png" id="backIcon">
        </div>

        <div id="backText">
          Voltar para listagem de Cursos
        </div>
      </a>
    </section>

    <?php
      $cod_del = $_POST['cod_del'];
      $nome = $_POST['nome'];
      require("../conecta.inc.php");
      $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
      $result=mysqli_query($ok, "delete from cursos where codigo='$cod_del'") 
      or die ("Não é possível excluir este curso!");
      echo "<script>alert('$nome deletado com sucesso!')</script>";
    ?>
  </body>
</html>





