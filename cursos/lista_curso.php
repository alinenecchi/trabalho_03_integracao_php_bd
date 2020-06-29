<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Cursos</title>

    <style type="text/css">
        @import "../css/stylesheet.css";
        @import "../css/cursos.css";
      </style>
  </head>

  <body>

    <div id="header">
      <h1>Lista de Cursos</h1>
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

    <div id="listagem">
      <?php
        require("../conecta.inc.php");
        $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
        $resultado=mysqli_query($ok, "Select * from cursos order by nome_curso") or die ("Não é possível consultar a lista de cursos"); 
        print("<table>");
        print("<tr>");
        print("<th><b>Codigo do curso</th>");
        print("<th><b>Nome do curso</th>");
        print("<th><b>Data da abertura</th>");
        print("<th><b>Deletar</th>");
        print("</tr>");
      
        while ($linha=mysqli_fetch_array($resultado)){
            $codigo        = $linha["codigo"];
            $nome_curso    = $linha["nome_curso"];
            $data_abertura = $linha["data_abertura"];
            print("<tr>");
            print("<td><b>$codigo</b></td>");
            print("<td>$nome_curso</td>");
            print("<td>$data_abertura</td>");
            echo("<td><a href='./curso_a_deletar.php?codigo=$codigo'>Deletar</a></td>");
            print("</tr>"); };
            print("</table>");
      ?> 
    </div>
  </body>
</html>
