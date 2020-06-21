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

  <?php
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $resultado1=mysqli_query($ok, "Select * from alunos,cursos,cidades where cidades.cod_cidade=alunos.cod_cidade and cursos.codigo_curso=alunos.cod_curso") or die ("Não é possível consultar a lista de alunos"); 
  print("<center><h2>LISTA DE ALUNOS</h2>");
  print("<table border='1' bordercolor='black'>");
  print("<tr><td><b>MATRÍCULA</td>");
  print("<td><b>Nome</td>");
  print("<td><b>Endereço</td>");
  print("<td><b>Cidade</td>");
  print("<td><b>Curso</td>");
  print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

  while ($linha=mysqli_fetch_array($resultado1))  
  {
    $Matricula=$linha["cod_aluno"];
    $NomeA=$linha["nomea"];
    $Endereco=$linha["endereco"];
    $Cidade=$linha["nome_cid"];
    $Curso=$linha["nome_cur"];
    print("<tr><td align='center'>$Matricula</td>");
    print("<td>$NomeA</td>");
    print("<td>$Endereco</td>");
    print("<td>$Cidade</td>");
    print("<td>$Curso</td>");
    print("<td><a href='confirma_deletar.php?cod=$Matricula'>Deletar</a></td>");
    print("<td><a href='altera_alunos.php?cod=$Matricula'>Alterar</a></td></tr>");  }
    print("</table></center>");
  ?> 
  </body>
</html>