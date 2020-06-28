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
      <h1>Deletar Curso</h1>
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

    <div id="infos">
      <?php
          $codigo = $_GET['codigo'];
          require("../conecta.inc.php");
          $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
          $result=mysqli_query($ok, "select * from cursos where codigo='$codigo'") 
          or die ("Não é possível retornar dados dos cursos!");
          $linha=mysqli_fetch_array($result);
          $cod_curso = $linha["codigo"];
          $nome_curso = $linha["nome_curso"];
          $data_abertura = $linha["data_abertura"];

          print("<p><b>Deletando o curso</b></p>");
          print("Código: $cod_curso<br>");
          print("Nome do curso: <b>$nome_curso</b><br>");
          print("Data de abertura: $data_abertura");

      ?>
      
      <div>
        <form action="./curso_deletado.php" method="POST">
          <input type="hidden" name="cod_del" value="<?php print($codigo)?>">
          <input type="hidden" name="nome" value="<?php print($nome_curso)?>">
          <input id="confirmaDeletar" name ="submit" type="submit" value="Confirmar Deletar"/>
        </form>
      </div>
    </div>

    <section id="cancelarNav";>
      <a href="lista_curso.php">
        <div id="CancelarButton">
          <img src="../images/cancel.png" id="cancelarIcon">
        </div>

        <div id="cancelarText">
          Cancelar
        </div>
      </a>
    </section>

  </body>
</html>
