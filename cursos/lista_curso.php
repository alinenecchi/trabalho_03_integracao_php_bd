<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Cursos</title>
  </head>

  <body>
  <?php
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $resultado=mysqli_query($ok, "Select * from cursos") or die ("Não é possível consultar a lista de cursos"); 
    print("<center><h2>LISTA DE CURSOS</h2>");
    print("<table border='1' bordercolor='black'>");
    print("<tr>");
    print("<td><b>Codigo do curso</td>");
    print("<td><b>Nome do curso</td>");
    print("<td><b>Data da abertura</td>");
    print("<td><b>Deletar</td>");
    print("</tr>");
  
    while ($linha=mysqli_fetch_array($resultado)){
        $nome_curso    = $linha["nome_curso"];
        $cod_curso     = $linha["cod_curso"];
        $data_abertura = $linha["data_abertura"];
        print("<tr>");
        print("<td>$cod_curso</td>");
        print("<td>$nome_curso</td>");
        print("<td>$data_abertura</td>");
        echo("<td><a href='deletar_curso.php?codigo=$cod_curso'>Deletar</a></td>");
        print("</tr>"); };
        print("</table></center>");
  ?> 
  </body>
</html>