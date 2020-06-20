<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Alunos</title>
  </head>

  <body>
  <?php
    $Matricula=$_GET['cod_aluno'];
    require("conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $resultado1=mysqli_query($ok, "Select * from alunos, cidades, cursos where cidades.cod_cidade=aluno.cidade, cursos.cod_curso = aluno.curso order by nomea") or die ("Não é possível consultar a lista de alunos"); 
  print("<center><h2>LISTA DE ALUNOS</h2>");
  print("<table border='1' bordercolor='black'>");
  print("<tr><td><b>MATRÍCULA</td>");
  print("<td><b>Nome</td>");
  print("<td><b>Endereço</td>");
  print("<td><b>Cidade</td>");
  print("<td><b>Curso</td>");
  print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

  while ($linha=mysqli_fetch_array($resultado))  
  {
    $Matricula=$linha["cod_aluno"];
    $NomeA=$linha["nomea"];
    $Endereco=$linha["endereco"];
    $CidadeA=$linha["cod_cidade"];
    $CursoA=$linha["cod_curso"];
    print("<tr><td align='center'>$Matricula</td>");
    print("<td>$NomeA</td>");
    print("<td>$Endereco</td>");
    print("<td>$CrusoA</td>");
    print("<td><a href='deletarf.php?cod=$cod_aluno'>Deletar</a></td>");
    print("<td><a href='alterarf.php?cod=$cod_aluno'>Alterar</a></td></tr>");  }
    print("</table></center>");
  ?> 
  </body>
</html>