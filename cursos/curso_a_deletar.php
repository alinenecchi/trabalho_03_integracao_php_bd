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

<?php
    $codigo = $_GET['codigo'];
    require("../conecta.inc.php");
    $ok = conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    $result=mysqli_query($ok, "select * from cursos where cod_curso='$codigo'") 
    or die ("Não é possível retornar dados dos cursos!");
    $linha=mysqli_fetch_array($result);
    $cod_curso = $linha["cod_curso"];
    $nome_curso = $linha["nome_curso"];
    $data_abertura = $linha["data_abertura"];

    print("<div><h3>Deletando o curso:</h3>");
    print("Código: $cod_curso<br>");
    print("Nome do curso: <b>$nome_curso</b><br>");
    print("Data de abertura: $data_abertura</div>");

?>
  <div>
  
    <form action="" method="POST">
      <input type="hidden" name="cod_del" value="<?php print($codigo)?>">
      <input type="hidden" name="nome" value="<?php print($nome_curso)?>">
      <input name ="submit" type="submit" value="Confirma Deletar"/>
    </form>
    <button><a href="lista_curso.php">Cancelar e voltar</a></button>
  </div>

  

</body>
</html>
