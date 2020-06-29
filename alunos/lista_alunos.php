<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Alunos</title>

    <style type="text/css">
      @import "../css/stylesheet.css";
      @import "../css/alunos.css";
    </style>
  </head>

  <body>

    <div id="header">
      <h1>Lista de Alunos</h1>
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
        $resultado1=mysqli_query($ok, "Select * from alunos,cursos,cidades where cidades.cod_cidade=alunos.cidade and cursos.codigo=alunos.curso order by nome_aluno") or die ("Não é possível consultar a lista de alunos");
      print("<table>");
      print("<tr><th><b>Matrícula</th>");
      print("<th><b>Nome</th>");
      print("<th><b>Endereço</th>");
      print("<th><b>Cidade</th>");
      print("<th><b>Curso</th>");
      print("<th><b>Deletar</th><th><b>Alterar</th></tr>");

      while ($linha=mysqli_fetch_array($resultado1))  
      {
        $Matricula  =$linha["matricula"];
        $Nome_aluno =$linha["nome_aluno"];
        $Endereco   =$linha["endereco"];
        $Cidade     =$linha["nome_cid"];
        $Curso      =$linha["nome_curso"];
        print("<tr><td><b>$Matricula</b></td>");
        print("<td>$Nome_aluno</td>");
        print("<td>$Endereco</td>");
        print("<td>$Cidade</td>");
        print("<td>$Curso</td>");
        echo("<td><a href='aluno_a_deletar.php?cod=$Matricula'>Deletar</a></td>");
        echo("<td><a href='altera_alunos.php?cod=$Matricula'>Alterar</a></td></tr>");  }
        print("</table></center>");
      ?>
    </div>
  </body>
</html>
